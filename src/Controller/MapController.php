<?php

namespace App\Controller;

use App\Entity\Role;
use App\Entity\User;
use App\Entity\PsbEventsPers;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MapController extends AbstractController
{
    /**
     * @Route("/user/map", name="user_map")
     */
    public function showmap(): Response
    {
        $this->denyAccessUnlessGranted(Role::USER);

        /** @var User $user */
        $user = $this->getUser();

        $em = $this->get('doctrine')->getManager();

        if (isset($_REQUEST['save'])) {

            $map = $em->getRepository(PsbEventsPers::class)
                ->findOneBy(
                    array('idUser' => $user->getId(),
                          'status' => 0),
                    array('numberOrder' => 'ASC'),
                    1,
                    0
                );

            $map->setStatus(1);
            $em->persist($map);
            $em->flush();

        }

        $query = $em->createQuery(
            'SELECT e.id, e.typEvent, e.event as eventfull, e.eventHyperlink link,
                    substring(e.event,0,15) as event, p.status, t.name, 
               FROM App\Entity\PsbEvents e,  
                    App\Entity\PsbEventsPers p,
                    App\Entity\PsbEventsTypes t
              WHERE e.id = p.idEvents 
                AND e.typEvent = t.id
                AND e.doPerson = 1
                AND p.idUser = '.$user->getId().'                
              ORDER BY p.numberOrder
               ');

        $events = $query->getResult();

        return $this->render('map/map.html.twig', [
            'title' => 'График адаптации',
            'breadcrumbs' => [
                [
                    'url' => $this->generateUrl('user'),
                    'name' => 'Кабинет сотрудника',
                ],
                [
                    'name' => 'График адаптации',
                ],
            ],
            'events' => $events
        ]);
    }

}
