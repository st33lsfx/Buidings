<?php

namespace App\Controller\admin\Building;

use App\Controller\BaseController;
use App\Entity\Building\Building;
use App\Form\BuildingType;
use App\Model\Building\BuildingModel;
use App\Repository\Building\BuildingRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
class BuildingController extends BaseController
{

    private BuildingRepository $buildingRepository;
    private EntityManagerInterface $em;

    public function __construct(EntityManagerInterface $em, BuildingRepository $buildingRepository)
    {
        $this->buildingRepository = $buildingRepository;
        $this->em = $em;
    }

    #[Route('/building/', name: 'app_building_homepage')]
    public function list(): Response
    {
        $buildings = $this->buildingRepository->findAll();

        return $this->render('admin/building/list.html.twig', [
            'buildings' => $buildings,
        ]);
    }

    #[Route('/building/create/', name: 'app_building_create')]
    public function create( Request $request ): Response
    {
        $newBuilding = new Building();
        $form = $this->createForm(BuildingType::class, $newBuilding);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $newBuilding = $form->getData();

            $this->em->persist($newBuilding);
            $this->em->flush();

            $this->addFlash(BaseController::FL_SUCCESS, 'Budova byla úspěšně přidána');
            return $this->redirectToRoute('app_building_homepage', []);
        }

        return $this->render('admin/building/create.html.twig', [
            'form' => $form->createView()
        ]);

    }

    #[Route('/building/edit/{id}', name: 'app_building_edit')]
    public function update(Building $building, BuildingModel $buildingModel, EntityManagerInterface $em, Request $request): Response
    {
        $editBuilding = $buildingModel->createFromEntity($building);

        $form = $this->createForm(BuildingType::class, $building);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $editBuilding = $form->getData();

            $building->modify($editBuilding);
            $em->flush();
            $this->addFlash(BaseController::FL_SUCCESS, 'uspěšně upraveno');
            return $this->redirectToRoute('app_building_homepage', []);

        }
        return $this->render('admin/building/edit.html.twig', [
            'building' => $building,
            'form' => $form->createView()
        ]);
    }

    #[Route('/building/{id}/delete', name: 'app_building_delete')]
    public function delete(ManagerRegistry $doctrine, int $id): Response
    {
        $entityManager = $doctrine->getManager();
        $building = $entityManager->getRepository(Building::class)->find($id);

        $this->addFlash(BaseController::FL_SUCCESS, 'Budova byla úspěšně smazána.');

        $entityManager->remove($building);
        $entityManager->flush();

        return $this->redirectToRoute('app_building_homepage');
    }
}
