<?php

namespace App\Controller;

//use http\Env\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use GuzzleHttp\Client;
use GuzzleHttp\EntityBody;
use GuzzleHttp\Exception\RequestException;

class ControlleurLoginController extends AbstractController
{

    /**
     * @Route("/login",name="login")
     * @param Request $request
     * @param SessionInterface $session
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     */

    public function Login(Request $request,SessionInterface $session)
    {
        // Récupération de la variable session 'utilisateur' pour tester si l'utilisateur est authentifié
        $session_utilisateur = $session->get("utilisateur");

        if(isset($session_utilisateur)){
            return $this->redirectToRoute("Liste_etudiant_present",array("retour" => 0));
        }else{

            if(isset($request->request) && !empty($request->request->get("utilisateur")) && !empty($request->request->get("motdepasse"))){

                //Récuperation de l'identifiant et le mot de passe pour se connecter à l'api
                $utilisateur = $request->request->get("utilisateur");
                $motdepasse = $request->request->get("motdepasse");

                //Connextion à l'api pour tester si l'identifiant et le mdp correct avec la fonction CallAPI
                $result = $this->CallAPI($utilisateur,$motdepasse);
                if($result){
                    $session->set("utilisateur",$utilisateur);
                    return $this->redirectToRoute("Liste_etudiant_present",array("retour" => 0));
                }else{
                    return $this->render('controlleur_login/login.html.twig',array("erreur" => 0));
                }

            }else{

                return $this->render('controlleur_login/login.html.twig');
            }
            return $this->render('controlleur_login/login.html.twig');
        }
    }

    /**
     * @Route("/deconnect",name="deconnexion")
     * @param SessionInterface $session
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */

    public function Deconnexion(SessionInterface $session)
    {
        $session->set('utilisateur', null);
        return $this->redirectToRoute('login');

    }

    public function CallAPI(String $login,String $mdp){

        try{

            $client = new Client();
            $response = $client->post("https://casv6.univ-angers.fr/cas/v1/tickets?username=$login&password=$mdp",
                [
                    "headers" => [
                        "Content-Type" => "application/x-www-form-urlencoded",
                        "Cache-Control" => "no-cache"
                    ]]);

            return $response->getStatusCode() == 201;

        }catch(\Exception $ex){

            return false;


        }
    }
}