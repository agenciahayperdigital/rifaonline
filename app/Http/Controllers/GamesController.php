<?php

namespace App\Http\Controllers;

use App\AutoMessage;
use App\Helpers\Helper;
use App\Participant;
use App\Product;
use App\CreateProductimage;
use App\Customer;
use App\Environment;
use App\GanhosAfiliado;
use App\Models\Order;
use App\Models\Participante;
use App\Models\Premio;
use App\Models\Product as ModelsProduct;
use App\Models\Raffle;
use App\RifaAfiliado;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use QRcode;

class GamesController extends Controller
{
function game3dBlackjack(){
    $ganhadores = Premio::where('descricao', '!=', null)->where('ganhador', '!=', '')->get();
    $products = ModelsProduct::where('visible', '=', 1)->orderBy('id', 'desc')->get();
    $winners = ModelsProduct::where('status', '=', 'Finalizado')->where('visible', '=', 1)->where('winner', '!=', null)->get();
    $config = DB::table('consulting_environments')->where('id', '=', 1)->first();
    
    return view('games.gameGame3dBlackjack', [
            'products' => $products,
            'winners' => $winners,
            'ganhadores' => $ganhadores,
            'user' => User::find(1),
            'productModel' => ModelsProduct::find(4),
            'config' => $config
        ]);
}
function game3dRoulett(){
    $ganhadores = Premio::where('descricao', '!=', null)->where('ganhador', '!=', '')->get();
    $products = ModelsProduct::where('visible', '=', 1)->orderBy('id', 'desc')->get();
    $winners = ModelsProduct::where('status', '=', 'Finalizado')->where('visible', '=', 1)->where('winner', '!=', null)->get();
    $config = DB::table('consulting_environments')->where('id', '=', 1)->first();

    return view('games.game3dRoulett', [
            'products' => $products,
            'winners' => $winners,
            'ganhadores' => $ganhadores,
            'user' => User::find(1),
            'productModel' => ModelsProduct::find(4),
            'config' => $config
        ]);
}
function gameAviator(){
    $ganhadores = Premio::where('descricao', '!=', null)->where('ganhador', '!=', '')->get();
    $products = ModelsProduct::where('visible', '=', 1)->orderBy('id', 'desc')->get();
    $winners = ModelsProduct::where('status', '=', 'Finalizado')->where('visible', '=', 1)->where('winner', '!=', null)->get();
    $config = DB::table('consulting_environments')->where('id', '=', 1)->first();
    
    return view('games.gameAviator', [
            'products' => $products,
            'winners' => $winners,
            'ganhadores' => $ganhadores,
            'user' => User::find(1),
            'productModel' => ModelsProduct::find(4),
            'config' => $config
        ]);
}
function gameDoubleBonus(){
    $ganhadores = Premio::where('descricao', '!=', null)->where('ganhador', '!=', '')->get();
    $products = ModelsProduct::where('visible', '=', 1)->orderBy('id', 'desc')->get();
    $winners = ModelsProduct::where('status', '=', 'Finalizado')->where('visible', '=', 1)->where('winner', '!=', null)->get();
    $config = DB::table('consulting_environments')->where('id', '=', 1)->first();
    
    return view('games.gameDoubleBonus', [
            'products' => $products,
            'winners' => $winners,
            'ganhadores' => $ganhadores,
            'user' => User::find(1),
            'productModel' => ModelsProduct::find(4),
            'config' => $config
        ]);
}
function gameFourAces(){
    $ganhadores = Premio::where('descricao', '!=', null)->where('ganhador', '!=', '')->get();
    $products = ModelsProduct::where('visible', '=', 1)->orderBy('id', 'desc')->get();
    $winners = ModelsProduct::where('status', '=', 'Finalizado')->where('visible', '=', 1)->where('winner', '!=', null)->get();
    $config = DB::table('consulting_environments')->where('id', '=', 1)->first();
    
    return view('games.gameFourAces', [
            'products' => $products,
            'winners' => $winners,
            'ganhadores' => $ganhadores,
            'user' => User::find(1),
            'productModel' => ModelsProduct::find(4),
            'config' => $config
        ]);
}
function gameGoalMania(){
    $ganhadores = Premio::where('descricao', '!=', null)->where('ganhador', '!=', '')->get();
    $products = ModelsProduct::where('visible', '=', 1)->orderBy('id', 'desc')->get();
    $winners = ModelsProduct::where('status', '=', 'Finalizado')->where('visible', '=', 1)->where('winner', '!=', null)->get();
    $config = DB::table('consulting_environments')->where('id', '=', 1)->first();
    
    return view('games.gameGoalMania', [
            'products' => $products,
            'winners' => $winners,
            'ganhadores' => $ganhadores,
            'user' => User::find(1),
            'productModel' => ModelsProduct::find(4),
            'config' => $config
        ]);
}
function gameHalloweenVip30(){
    $ganhadores = Premio::where('descricao', '!=', null)->where('ganhador', '!=', '')->get();
    $products = ModelsProduct::where('visible', '=', 1)->orderBy('id', 'desc')->get();
    $winners = ModelsProduct::where('status', '=', 'Finalizado')->where('visible', '=', 1)->where('winner', '!=', null)->get();
    $config = DB::table('consulting_environments')->where('id', '=', 1)->first();
    
    return view('games.gameHalloweenVip30', [
            'products' => $products,
            'winners' => $winners,
            'ganhadores' => $ganhadores,
            'user' => User::find(1),
            'productModel' => ModelsProduct::find(4),
            'config' => $config
        ]);
}
function gameIrishTreasures(){
    $ganhadores = Premio::where('descricao', '!=', null)->where('ganhador', '!=', '')->get();
    $products = ModelsProduct::where('visible', '=', 1)->orderBy('id', 'desc')->get();
    $winners = ModelsProduct::where('status', '=', 'Finalizado')->where('visible', '=', 1)->where('winner', '!=', null)->get();
    $config = DB::table('consulting_environments')->where('id', '=', 1)->first();
    
    return view('games.gameIrishTreasures', [
            'products' => $products,
            'winners' => $winners,
            'ganhadores' => $ganhadores,
            'user' => User::find(1),
            'productModel' => ModelsProduct::find(4),
            'config' => $config
        ]);
}
function gameMedieval(){
    $ganhadores = Premio::where('descricao', '!=', null)->where('ganhador', '!=', '')->get();
    $products = ModelsProduct::where('visible', '=', 1)->orderBy('id', 'desc')->get();
    $winners = ModelsProduct::where('status', '=', 'Finalizado')->where('visible', '=', 1)->where('winner', '!=', null)->get();
    $config = DB::table('consulting_environments')->where('id', '=', 1)->first();
    
    return view('games.gameMedieval', [
            'products' => $products,
            'winners' => $winners,
            'ganhadores' => $ganhadores,
            'user' => User::find(1),
            'productModel' => ModelsProduct::find(4),
            'config' => $config
        ]);
}
function gameRockTheCashBar(){
    $ganhadores = Premio::where('descricao', '!=', null)->where('ganhador', '!=', '')->get();
    $products = ModelsProduct::where('visible', '=', 1)->orderBy('id', 'desc')->get();
    $winners = ModelsProduct::where('status', '=', 'Finalizado')->where('visible', '=', 1)->where('winner', '!=', null)->get();
    $config = DB::table('consulting_environments')->where('id', '=', 1)->first();
    
    return view('games.gameRockTheCashBar', [
            'products' => $products,
            'winners' => $winners,
            'ganhadores' => $ganhadores,
            'user' => User::find(1),
            'productModel' => ModelsProduct::find(4),
            'config' => $config
        ]);
}
function gameRoyalDiamond(){
    $ganhadores = Premio::where('descricao', '!=', null)->where('ganhador', '!=', '')->get();
    $products = ModelsProduct::where('visible', '=', 1)->orderBy('id', 'desc')->get();
    $winners = ModelsProduct::where('status', '=', 'Finalizado')->where('visible', '=', 1)->where('winner', '!=', null)->get();
    $config = DB::table('consulting_environments')->where('id', '=', 1)->first();
    
    return view('games.gameRoyalDiamond', [
            'products' => $products,
            'winners' => $winners,
            'ganhadores' => $ganhadores,
            'user' => User::find(1),
            'productModel' => ModelsProduct::find(4),
            'config' => $config
        ]);
}
}