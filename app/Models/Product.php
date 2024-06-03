<?php

namespace App\Models;

use App\AutoMessage;
use App\CompraAutomatica;
use App\CreateProductimage;
use App\Environment;
use App\Helpers\Helper;
use App\Promocao;
use App\RifaAfiliado;
use App\User;
use Illuminate\Support\Number;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'numbers',
        'ganho_afiliado',
        'price',
        'tipo_cotas',
        'cotas_premiadas'
    ];


    public function totalVendidoDosAfiliados()
    {
        $total = 0;

        $total = DB::table('ganhos_afiliados')
            ->where('pago', 1)
            ->where('product_id', $this->id)
            ->sum('valor');

        return  $total;
    }

    public function gerarNumeros($qdtNumero, $comZeros = false)
    {
        $numeros = [];

        for ($i = 1; $i <= $qdtNumero; $i++) {
            $numeros[] = $i;
        }

        // Verificar o último número do array
        $ultimoNumero = end($numeros);

        // Calcular o tamanho do último número
        $tamanhoUltimoNumero = strlen($ultimoNumero);

        // Percorrer o array e adicionar zeros à esquerda
        if ($comZeros) {

            foreach ($numeros as &$numero) {
                $numero = str_pad($numero, $tamanhoUltimoNumero, '0', STR_PAD_LEFT);
            }
        }

        return [
            'numeros' => $numeros,
            'ultimoNumero' => $ultimoNumero,
        ];
    }

    function gerarCodasPremiadas($request, $qtdZeros)
    {
        $codas_premiadas = [];

        foreach ($request as $key => $value) {

            if (preg_match('/^\d+_n_cota$/', $key)) {

                $numeroCota = (int)$value;

                if ($numeroCota >= 0) {
                    $nbr = str_pad($numeroCota, $qtdZeros, '0', STR_PAD_LEFT);
                    array_push($codas_premiadas, $nbr);
                } else {
                    array_push($codas_premiadas, 0);
                }
            }
        }

        // Concatena os números formatados em uma string separada por vírgula
        $stringCodasPremiadas = implode(",", $codas_premiadas);

        return $stringCodasPremiadas;
    }

    function temCotasPremiadas()
    {
        $cotas = $this->cotas_premiadas;

        $tem_cotas = false;

        $cotas_array = explode(',', $cotas);

        foreach ($cotas_array as $valor) {
            // Convertendo o valor para inteiro e verificando se é diferente de zero
            if ((int)$valor !== 0) {
                // Se encontrarmos um valor diferente de zero, atualizamos nossa flag
                $tem_cotas = true;
                // Se já encontramos um valor diferente de zero, não precisamos verificar mais
                break;
            }
        }

        // Retornamos um array contendo o booleano e o array de cotas premiadas
        return [$tem_cotas, $cotas_array];
    }

    function existeCotaPremiadasNosNumeros($numbers)
    {
        // Primeiro, dividimos as cotas premiadas e os números em arrays
        $cotas_array = explode(',', $this->cotas_premiadas);
        $numbers_array = json_decode($numbers);
        $estaPremiada = false;

        // Inicializamos um array para armazenar os números que existem nas cotas premiadas
        $numeros_encontrados = [];

        // Iteramos sobre cada número
        foreach ($numbers_array as $numero) {
            // Verificamos se o número existe nas cotas premiadas
            if (in_array($numero, $cotas_array)) {
                $numeros_encontrados[] = $numero; // Se encontrado, adicionamos ao array
            }
        }

        // Se pelo menos um número for encontrado, retornamos true e os números encontrados
        if (!empty($numeros_encontrados)) {
            $estaPremiada = true;
            return [$numeros_encontrados, $estaPremiada];
        }

        // Se nenhum número for encontrado, retornamos false
        return [[], $estaPremiada];
    }

    public function numbers()
    {
        if ($this->modo_de_jogo == 'numeros') {
            $numbersRifa = explode(",", $this->numbers);
            // $path = 'numbers/' . $this->id . '.json';
            // $jsonString = file_get_contents($path);
            // $numbersRifa = json_decode($jsonString, true);

            return $numbersRifa;
        } else {
            return $this->hasMany(Raffle::class, 'product_id', 'id')->get();
        }
    }

    public function participantesArray($limite)
    {
        $response = [];
        $participantes = Participante::where('product_id', '=', $this->id)->where('id', '!=', 5)->limit($limite)->get();
        foreach ($participantes as $participante) {
            array_push($response, $participante->id);
        }

        return implode(",", $response);
    }

    public function getAllNumbers()
    {
        $allNumbers = [];
        $numbersDisponiveis = $this->numbers();
        foreach ($numbersDisponiveis as $number) {
            array_push($allNumbers, [
                'key' => $number,
                'number' => $number,
                'status' => 'Disponivel'
            ]);
        }

        return $allNumbers;
    }

    public function saveNumbers($numbersArray)
    {
        $stringNumbers = implode(",", $numbersArray);

        // if($stringNumbers == ""){
        //     throw new \ErrorException('Erro encontrado, entre em contato com o administrador do sistema');
        // }
        $this->update([
            'numbers' => $stringNumbers
        ]);
        // $arquivo = 'numbers/' . $this->id . '.json';
        // $req = fopen($arquivo, 'w') or die('Cant open the file');
        // fwrite($req, json_encode($numbersArray));
        // fclose($req);

        // $arquivoDebug = 'numbers/' . $this->id . '-debug5.json';
        // $req = fopen($arquivoDebug, 'w') or die('Cant open the file');
        // fwrite($req, json_encode($numbersArray));
        // fclose($req);
    }

    public function qtdNumerosDisponiveis()
    {
        if ($this->modo_de_jogo == 'numeros') {
            return $this->qtd - $this->qtdNumerosReservados() - $this->qtdNumerosPagos();
        } else {
            return $this->hasMany(Raffle::class, 'product_id', 'id')->where('status', '=', 'Disponível')->get()->count();
        }
    }

    public function randomNumbers($qtd)
    {
        $randomNumbers = DB::table('raffles')
            ->select('number')
            ->where('raffles.product_id', '=', $this->id)
            ->where('raffles.status', '=', 'Disponível')
            ->inRandomOrder()
            ->limit($qtd)
            ->get();

        return $randomNumbers;
    }

    public function numerosDisponiveis()
    {
        $response = [];
        $numeros = $this->hasMany(Raffle::class, 'product_id', 'id')->where('status', '=', 'Disponível')->get();

        foreach ($numeros as $numero) {
            array_push($response, $numero->number);
        }

        return $response;
    }

    public function qtdNumerosReservados()
    {
        if ($this->modo_de_jogo == 'numeros') {
            return $this->participantes()->sum('reservados');
        } else {
            return $this->hasMany(Raffle::class, 'product_id', 'id')->where('status', '=', 'Reservado')->get()->count();
        }
    }

    public function numerosReservados()
    {
        return $this->hasMany(Raffle::class, 'product_id', 'id')->where('status', '=', 'Reservado')->get();
    }

    public function qtdNumerosPagos()
    {
        if ($this->modo_de_jogo == 'numeros') {
            return $this->participantes()->sum('pagos');
        } else {
            return $this->hasMany(Raffle::class, 'product_id', 'id')->where('status', '=', 'Pago')->get()->count();
        }
    }

    public function porcentagem()
    {
        $numerosUtilizados = $this->qtdNumerosReservados() + $this->qtdNumerosPagos();

        $totalDaRifa = $this->qtd;

        $percentual = ($numerosUtilizados * 100) / $totalDaRifa;

        return round($percentual, 2);
    }

    public function participantes()
    {
        return $this->hasMany(Participante::class, 'product_id', 'id')->orderBy('id', 'desc')->get();
    }

    public function participantesReservados()
    {
        $numeros = Raffle::select('participant_id')
            ->where('product_id', '=', $this->id)
            ->where('status', '=', 'Reservado')
            ->groupBy('participant_id')
            ->get();

        return $numeros;
    }

    public function promocoes()
    {
        return $this->hasMany(Promocao::class, 'product_id', 'id')->orderBy('ordem', 'asc')->get();
    }

    public function promosAtivas()
    {
        $promocoes = $this->promocoes()->where('qtdNumeros', '>', 0);
        $result = [];
        foreach ($promocoes as $promocao) {
            array_push($result, [
                'numeros' => $promocao->qtdNumeros,
                'desconto' => $promocao->desconto
            ]);
        }

        return json_encode($result);
    }

    public function imagem()
    {
        return $this->hasOne(CreateProductimage::class, 'product_id', 'id')->first();
    }

    public function fotos()
    {
        return $this->hasMany(CreateProductimage::class, 'product_id', 'id')->limit(3)->get();
    }

    public function getParticipanteName($id)
    {
        $participante = Participante::find($id);

        return $participante->name;
    }

    public function getParticipantePhone($id)
    {
        $participante = Participante::find($id);

        return '(**) ***** - ' . substr($participante->telephone, -4);
    }

    public function numbersRelatorio()
    {
        if ($this->modo_de_jogo == 'numeros') {
            $numbersRifa = $this->numbers();
            $numbersRelatorio = array_filter($numbersRifa, function ($number) {
                return $number['status'] != 'Disponivel';
            });
            return $numbersRelatorio;
        } else {
            return $this->hasMany(Raffle::class, 'product_id', 'id')->where('participant_id', '!=', null)->orderBy('number', 'asc')->get();
        }
    }

    public function medalhaRanking($posicao)
    {
        switch ($posicao) {
            case '0':
                return '🥇';
                break;
            case '1':
                return '🥈';
                break;
            case '2':
                return '🥉';
                break;
            default:
                return '🏅';
                break;
        }
    }

    public function ranking()
    {

        $ranking = DB::table('participant')
            ->select(DB::raw('SUM(participant.pagos) as totalReservas'), 'participant.telephone', 'participant.name')
            ->where('participant.product_id', '=', $this->id)
            ->where('participant.pagos', '>', 0)
            ->groupBy('participant.telephone')
            ->orderBy('totalReservas', 'desc')
            ->limit($this->qtd_ranking)
            ->get();


        // $ranking = DB::table('raffles')
        //     ->select(DB::raw('COUNT(raffles.id) as totalReservas'), 'participant.telephone', 'participant.name')
        //     ->where('raffles.product_id', '=', $this->id)
        //     ->where('raffles.participant_id', '!=', null)
        //     ->where('raffles.status', '=', 'Pago')
        //     ->join('participant', 'participant.id', '=', 'raffles.participant_id')
        //     ->groupBy('participant.telephone')
        //     ->orderBy('totalReservas', 'desc')
        //     ->limit($this->qtd_ranking)
        //     ->get();

        return $ranking->toArray();
    }

    public function rankingAdmin()
    {

        $ranking = DB::table('participant')
            ->select(DB::raw('SUM(participant.pagos) as totalReservas'), DB::raw('SUM(participant.valor) as totalGasto'), 'participant.telephone', 'participant.name')
            ->where('participant.product_id', '=', $this->id)
            ->where('participant.pagos', '>', 0)
            ->groupBy('participant.telephone')
            ->orderBy('totalReservas', 'desc')
            ->limit(8)
            ->get();

        // $ranking = DB::table('raffles')
        //     ->select(DB::raw('COUNT(raffles.id) as totalReservas'), 'participant.telephone', 'participant.name')
        //     ->where('raffles.product_id', '=', $this->id)
        //     ->where('raffles.participant_id', '!=', null)
        //     ->where('raffles.status', '=', 'Pago')
        //     ->join('participant', 'participant.id', '=', 'raffles.participant_id')
        //     ->groupBy('participant.telephone')
        //     ->orderBy('totalReservas', 'desc')
        //     ->limit(8)
        //     ->get();

        return $ranking->toArray();
    }

    public function descricao()
    {
        $desc = $this->hasOne(DescricaoProduto::class, 'product_id', 'id')->first();
        if ($desc) {
            return $desc->description;
        } else {
            return '';
        }
    }

    public function premios()
    {
        $premios = $this->hasMany(Premio::class, 'product_id', 'id')->orderBy('ordem', 'asc')->get();

        if ($premios->count() === 0) {
            for ($i = 1; $i <= 10; $i++) {
                Premio::create([
                    'product_id' => $this->id,
                    'ordem' => $i,
                    'descricao' => '',
                    'ganhador' => '',
                    'cota' => ''
                ]);
            }

            return $this->hasMany(Premio::class, 'product_id', 'id')->orderBy('ordem', 'asc')->get();
        } else {
            return $premios;
        }
    }

    public function status()
    {
        // teste 123
        switch ($this->status) {
            case 'Ativo':
                if ($this->porcentagem() >= 80) {
                    $status = '<span class="badge mt-2 blink" style="color: #fff; background-color: #f38e02">Corre que está acabando!</span>';
                } else {
                    $status = '<span class="badge mt-2 bg-success blink">RESERVE SUAS COTAS 🪙</span>';
                }
                break;
            case 'Finalizado':
                if ($this->premios()->where('descricao', '!=', '')->where('ganhador', '!=', '')->count() == 0) {
                    $status = '<span class="badge bg-primary mt-2 blink" style="color: #fff">Esgotado! Aguarde sorteio!</span>';
                } else {
                    $status = '<span class="badge mt-2 bg-danger">FINALIZADA - CONFIRA O VENCEDOR</span>';
                }

                break;
            default:
                $status = '';
                break;
        }

        return $status;
    }

    public function dataSorteio()
    {
        switch ($this->status) {
            case 'Ativo':
                if ($this->porcentagem() >= 80) {
                    $sorteioStatus = '<span class="badge mt-2 bg-warning" style="color: #000">' . date('d/m/Y', strtotime($this->draw_date)) . '</span>';
                } else {
                    $sorteioStatus = '<span class="badge mt-2 bg-success">' . date('d/m/Y', strtotime($this->draw_date)) . '</span>';
                }
                break;
            case 'Finalizado':
                if ($this->premios()->where('descricao', '!=', '')->where('ganhador', '!=', '')->count() == 0) {
                    $sorteioStatus = '<span class="badge mt-2" style="background: orange; color: #000">' . date('d/m/Y', strtotime($this->draw_date)) . '</span>';
                } else {
                    $sorteioStatus = '<span class="badge mt-2 bg-danger">' . date('d/m/Y', strtotime($this->draw_date)) . '</span>';
                }

                break;
            default:
                $sorteioStatus = '';
                break;
        }

        return $sorteioStatus;
    }

    public function getParticipanteById($id)
    {
        return Participante::find($id);
    }

    public function confirmPayment($participanteId)
    {
        if ($this->modo_de_jogo == 'numeros') {
            $participante = Participante::find($participanteId);

            $numbersParticipante = $participante->numbers();
            $rifaNumbers = $participante->rifa()->numbers();

            foreach ($numbersParticipante as $number) {
                $number->status = 'Pago';
                $rifaNumbers[$number->key]['status'] = 'Pago';
            }

            $participante->update([
                'numbers' => json_encode($numbersParticipante),
                'reservados' => 0,
                'pagos' => count($numbersParticipante)
            ]);

            $this->saveNumbers($rifaNumbers);
            $this->mensagemWPPRecebido($participante->id);
        } else {
            Raffle::where('participant_id', '=', $participanteId)->update(['status' => 'Pago']);
        }
    }

    public function mensagemWPPRecebido($participanteID)
    {
        $admin = User::find(1);
        $config = Environment::find(1);
        $participante = Participante::find($participanteID);
        $msgAdmin = AutoMessage::where('identificador', '=', 'recebido-admin')->first();
        $msgCliente = AutoMessage::where('identificador', '=', 'recebido-cliente')->first();
        $apiURL = env('URL_API_CRIAR_WHATS');

        if ($config->token_api_wpp != null) {

            // ============== Mensagem para o admin
            // ============================================== //
            if ($msgAdmin->msg != null && $msgAdmin->msg != '') {
                $mensagem = $msgAdmin->getMessage($participante);
                $owerPhone = '55' . str_replace(["(", ")", "-", " "], "", $admin->telephone);
                (new Helper())->sendZap($owerPhone, $mensagem);
            }

            // ============== Mensagem para o cliente
            // ============================================== //
            if ($msgCliente->msg != null && $msgCliente->msg != '') {
                $mensagem = $msgCliente->getMessage($participante);
                $customerPhone = '55' . str_replace(["(", ")", "-", " "], "", $participante->telephone);
                (new Helper())->sendZap($customerPhone, $mensagem);
            }
        }
    }

    public function afiliados()
    {
        return $this->hasMany(RifaAfiliado::class, 'product_id', 'id')->get();
    }

    public function checkAfiliado()
    {
        $user = Auth::user();

        $afiliado = $this->afiliados()->where('afiliado_id', '=', $user->id);

        if ($afiliado->count() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getAfiliadoToken()
    {
        $afiliado = RifaAfiliado::where('product_id', '=', $this->id)->where('afiliado_id', '=', Auth::user()->id)->first();

        if ($afiliado) {
            return $afiliado->token;
        } else {
            return '';
        }
    }

    public function comprasAuto()
    {
        $compras = $this->hasMany(CompraAutomatica::class, 'product_id', 'id')->get();
        if ($compras->count() == 0) {
            $this->defaultComprasAuto();
            $compras = $this->hasMany(CompraAutomatica::class, 'product_id', 'id')->get();
        }

        return $compras;
    }

    public function defaultComprasAuto()
    {
        CompraAutomatica::create([
            'product_id' => $this->id,
            'qtd' => 5,
            'popular' => false
        ]);

        CompraAutomatica::create([
            'product_id' => $this->id,
            'qtd' => 10,
            'popular' => false
        ]);

        CompraAutomatica::create([
            'product_id' => $this->id,
            'qtd' => 30,
            'popular' => false
        ]);

        CompraAutomatica::create([
            'product_id' => $this->id,
            'qtd' => 50,
            'popular' => true
        ]);

        CompraAutomatica::create([
            'product_id' => $this->id,
            'qtd' => 0,
            'popular' => false
        ]);

        CompraAutomatica::create([
            'product_id' => $this->id,
            'qtd' => 0,
            'popular' => false
        ]);
    }

    public function getCompraMaisPopular()
    {
        $compras = $this->comprasAuto();
        if ($compras->where('popular', '=', true)->count() > 0) {
            return $compras->where('popular', '=', true)->first()->id;
        } else {
            return 0;
        }
    }

    public function totalValorVendido()
    {
        $totalNumero = $this->qtdNumerosPagos();
        $valor = (float) str_replace(',', '.', $this->price);
        $total = $valor * $totalNumero;

        return $total;
    }

    public function ganhosTotalPorAfiliado($afiliado_id)
    {

        return  DB::table('ganhos_afiliados')
            ->where('afiliado_id', $afiliado_id)
            ->sum('valor');
    }

    public function ganhosTotalPorAfiliadoPago($afiliado_id)
    {


        return DB::table('ganhos_afiliados')
            ->where('pago', 1)
            ->where('afiliado_id', $afiliado_id)
            ->sum('valor');
    }
    public function ganhosTotalPorAfiliadoPorRifa($afiliado_id)
    {

        return  DB::table('ganhos_afiliados')
            ->where('product_id', $this->id)
            ->where('afiliado_id', $afiliado_id)
            ->sum('valor');
    }

    public function ganhosTotalPorAfiliadoPorRifaPago($afiliado_id)
    {

        return DB::table('ganhos_afiliados')
            ->where('pago', 1)
            ->where('product_id', $this->id)
            ->where('afiliado_id', $afiliado_id)
            ->sum('valor');
    }

    public function existeNumerosIndisponiveis($numerosString)
    {
        $temNumerosIndisponiveis = false;
        $resultado = [];
        $numerosArrayDuplicados = explode(',', $numerosString);
        $arrayNumeros = [];

        $participantes = $this->participantes();

        foreach ($numerosArrayDuplicados as $numerosArrayDuplicado) {
            $expl = explode("-", $numerosArrayDuplicado);
            $keyNumber = end($expl);
            $arrayNumeros[] = $keyNumber;
        }

        foreach ($participantes as $participante) {
            $numbers = $participante->numbers;
            $pagos = $participante->pagos;
            $reservados = $participante->reservados;

            $numbersParticipantes = json_decode($numbers);

            $intersecao = array_intersect($arrayNumeros, $numbersParticipantes);

            if (!empty($intersecao)) {
                $resultado[] = true;
            } else {
                $resultado[] = false;
            }
        }

        if (in_array(true, $resultado)) {
            $temNumerosIndisponiveis = true;
        } else {
            $temNumerosIndisponiveis = false;
        }

        return $temNumerosIndisponiveis;
    }

    public function cotaPremiadaTemGanhador($numero)
    {

        $participantes = $this->participantes();

        foreach ($participantes as $participante) {
            $numbers = $participante->numbers;
            $numbersParticipantes = json_decode($numbers);
            $numbersParticipantes_inteiros = array_map('intval', $numbersParticipantes);

            if (in_array(intval($numero), $numbersParticipantes_inteiros)) {
                return true;
            }
        }


        return false;
    }

    public function removerCotasPremiadas($numeros_disponiveis)
    {
        if ($this->modo_de_jogo === 'numeros' && intval($this->tipo_cotas) > 0) {
            // if ($this->porcentagem() > intval($this->tipo_cotas) ){
            if ($this->porcentagem() <= intval($this->tipo_cotas)) {
                $cotas = explode(',', $this->cotas_premiadas);
                $numeros_disponiveis_inteiro = array_map('intval', $numeros_disponiveis);
                $cotas_inteiro = array_map('intval', $cotas);
                $numeros_disponiveis_inteiro_sem_cotas = array_diff($numeros_disponiveis_inteiro, $cotas_inteiro);
                $numeros_disponiveis_string_sem_cotas = array_map('strval', $numeros_disponiveis_inteiro_sem_cotas);
                // dd(intval($this->tipo_cotas), $this->porcentagem(), $cotas_inteiro, $numeros_disponiveis_string_sem_cotas, $numeros_disponiveis_inteiro_sem_cotas, $numeros_disponiveis_inteiro);
                return $numeros_disponiveis_string_sem_cotas;
                // dd('retirar cotas',$numeros_disponiveis_string_sem_cotas,$numeros_disponiveis,$numeros_disponiveis_inteiro,$cotas_inteiro,$numeros_disponiveis_inteiro_sem_cotas);   
            }
        }
        return $numeros_disponiveis;
    }

    public function listaParticipantesComCotasPremiadas()
    {
        $cotas_premiadas = $this->cotas_premiadas;
        $tipo_cotas = $this->tipo_cotas;
        if (intval($tipo_cotas) > 0) {
            $participantes = $this->participantes();
            $participante_com_cotas_premiadas = [];
            $id_adicionados = [];
            $id_map = [];
            foreach ($participantes as $participante) {
                if (!in_array($participante->customer_id, $id_adicionados)) {
                    $id_adicionados[] = $participante->customer_id;
                    $participante_com_cotas_premiadas[] = $participante;
                    // Mapeia o customer_id para a posição no array
                    $index = count($participante_com_cotas_premiadas) - 1;
                    $id_map[$participante->customer_id] = $index;
                } else {
                    $index = $id_map[$participante->customer_id];
                    $participante_com_cotas_premiadas[$index]->valor += $participante->valor;
                    $participante_com_cotas_premiadas[$index]->pagos += $participante->pagos;
                }
            }

            // Ordena o array pelo campo 'pagos' em ordem decrescente
            usort($participante_com_cotas_premiadas, function ($a, $b) {
                return $b->pagos - $a->pagos;
            });
            return $participante_com_cotas_premiadas;
        }
    }
}