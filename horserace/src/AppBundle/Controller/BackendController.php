<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Horse;
use AppBundle\Entity\HorseRace;
use AppBundle\Entity\Race;
use AppBundle\Entity\Bet;

use AppBundle\Form\HorseRaceType;
use AppBundle\Form\HorseType;
use AppBundle\Form\RaceType;
use AppBundle\Form\BetType;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/backend")
 */
class BackendController extends BaseController
{
    /**
     * @Route("/add-horse", name="backend_add_horse")
     */
    public function addHorseAction(Request $request)
    {
        $horse = new Horse();
        $form = $this->createForm(HorseType::class,$horse);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $this->getEntityManager()->persist($horse);
            $this->getEntityManager()->flush();
            return $this->redirectToRoute('backend_add_horse');
        }

        return $this->render('Backend/add_horse.html.twig',array(
            'form'=>$form->createView()
        ));
    }

    /**
     * @Route("/list-horses", name="backend_list_horses")
     */
    public function listHorsesAction(Request $request)
    {
        $horses = $this->getRepository('Horse')->findAll();

        return $this->render('Backend/list_horses.html.twig',array(
            'horses'=>$horses
        ));
    }

    /**
     * @Route("/add-race", name="backend_add_race")
     */
    public function addRaceAction(Request $request)
    {
        $race = new Race();
        $form = $this->createForm(RaceType::class,$race);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $this->getEntityManager()->persist($race);
            $this->getEntityManager()->flush();
            return $this->redirectToRoute('backend_race_add_horse',array('id'=>$race->getId()));
        }

        return $this->render('Backend/add_race.html.twig',array(
            'form'=>$form->createView()
        ));
    }

    /**
     * @Route("/list-races", name="backend_list_races")
     */
    public function listRacesAction(Request $request)
    {
        $races = $this->getRepository('Race')->findAll();
        return $this->render('Backend/list_races.html.twig',array(
            'races'=>$races
        ));
    }

    /**
     * @Route("/race/{id}/add-horse", name="backend_race_add_horse")
     */
    public function addHorseToRaceAction(Request $request,$id)
    {
        $race = $this->getRepository('Race')->find($id);
        $horseRaceArray = $this->getRepository('HorseRace')->findBy(array('race'=>$race));
        $horseRace = new HorseRace();
        $form = $this->createForm(HorseRaceType::class,$horseRace);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $horseRace->setRace($race);
            $this->getEntityManager()->persist($horseRace);
            $this->getEntityManager()->flush();
            return $this->redirectToRoute('backend_race_add_horse',array('id'=>$id));
        }

        return $this->render('Backend/add_horses_to_race.html.twig',array(
            'form'=>$form->createView(),
            'race'=>$race,
            'horseRaceArray'=>$horseRaceArray
        ));
    }

    /**
     * @Route("/add-bet", name="backend_add_bet")
     */
    public function addBetAction(Request $request){
        $bet= new Bet();
        $form = $this->createForm(BetType::class,$bet);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $this->getEntityManager()->persist($bet);
            $this->getEntityManager()->flush();
            return $this->redirectToRoute('backend_add_bet',array('id'=>$bet->getId()));
        }

        return $this->render('Frontend/add_bet.html.twig',array(
            'form'=>$form->createView()
        ));
    }

    /**
     * @Route("/list-bets", name="backend_list_bets")
     */
    public function listBetAction(){
        $bets= $this->getRepository('Bet')->findAll();
        return $this->render('Backend/list_bets.html.twig',array(
            'bets'=>$bets
        ));
    }

    /**
     * @Route("/race/horse/update", name="backend_horse_race_update")
     */
    public function updatePlaceAction(Request $request){
        $id= $request->get('id');
        $place= $request->get('place');
        $price= $request->get('price');

        $horseRace = $this->getRepository('HorseRace')->find($id);
        $horseRace->setPlace($place);
        $horseRace->setPrice($price);
        $this->getEntityManager()->flush();

        return new Response(json_encode('Successfully Updated'));
    }

    /**
     * @Route("/list-winners", name="backend_list_winners")
     */
    public function listWinnersAction(){
        $em = $this->getDoctrine()->getEntityManager();
        $repoBet = $em->getRepository('AppBundle:Bet');
        $repoHorseRace = $em->getRepository('AppBundle:HorseRace');
        $count = $repoBet->count();

        $output = array();

        for($i=1; $i<$count+1; $i++){
            $horseOnePlace = $repoBet->profile($i)->getHorseOne()->getPlace();
            $horseTwoPlace = $repoBet->profile($i)->getHorseTwo()->getPlace();
            $horseThreePlace = $repoBet->profile($i)->getHorseThree()->getPlace();
            $horseFourPlace = $repoBet->profile($i)->getHorseFour()->getPlace();

            $betValue = $repoBet->profile($i)->getPrice();

            $horseOnePrice = $repoBet->profile($i)->getHorseOne()->getPrice();
            $horseTwoPrice = $repoBet->profile($i)->getHorseTwo()->getPrice();
            $horseThreePrice = $repoBet->profile($i)->getHorseThree()->getPrice();
            $horseFourPrice = $repoBet->profile($i)->getHorseFour()->getPrice();

            if($horseOnePlace == 1 and $horseTwoPlace == 1 and $horseThreePlace == 1 and $horseFourPlace == 1){
                $finalValue = ($horseOnePrice * $horseTwoPrice * $horseThreePrice * $horseFourPrice) * ($betValue/10);
                $tempArray=array(
                    'win'=>$finalValue,
                    'bet'=>$repoBet->profile($i),
                );
            }else{
                $finalValue =0;
                $tempArray=array(
                    'win'=>$finalValue,
                    'bet'=>$repoBet->profile($i),
                );
            }
            array_push($output,$tempArray);
        }

        return $this->render('Backend/list_winners.html.twig', array(
            'winners'=>$output
        ));
    }

}
