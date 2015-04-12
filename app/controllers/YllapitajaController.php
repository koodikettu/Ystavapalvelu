<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AsiakasController
 *
 * @author markku
 */
class YllapitajaController extends BaseController {

    //put your code here

    public static function yllapitajan_kirjautuminen() {
        View::make('suunnitelmat/yllapitajan_kirjautuminen.html');
    }

    public static function kasittele_yllapitajan_kirjautuminen() {

        $params = $_POST;

        $yllapitaja = Yllapitaja::authenticate($params['kayttajatunnus'], $params['salasana']);

        if (!$yllapitaja) {
            View::make('/suunnitelmat/yllapitajan_kirjautuminen.html', array('error' => 'Väärä käyttäjätunnus tai salasana!', 'kayttajatunnus' => $params['kayttajatunnus']));
        } else {
            $_SESSION['yllapitajaid'] = $yllapitaja->yllapitajaid;
            Redirect::to('/suunnitelmat/yllapitajan_kayttajalistaus', array('message' => 'Tervetuloa takaisin ' . $yllapitaja->kayttajatunnus . '!'));
        }
    }

}