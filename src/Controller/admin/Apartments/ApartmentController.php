<?php

namespace App\Controller\admin\Apartments;

use App\Controller\BaseController;
use App\Entity\Apartments\Apartment;
use App\Form\ApartmentType;
use App\Repository\Apartment\ApartmentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApartmentController extends AbstractController
{

    private ApartmentRepository $apartmentsRepository;
    private EntityManagerInterface $em;
    public function __construct(ApartmentRepository $apartmentsRepository, EntityManagerInterface $em)
    {
        $this->apartmentsRepository = $apartmentsRepository;
        $this->em = $em;
    }

    #[Route('/apartment', name: 'app_apartment_list')]
    public function index(): Response
    {
        $apartments = $this->apartmentsRepository->findAll();

        return $this->render('admin/apartment/list.html.twig', [
            'apartment' => $apartments
        ]);
    }

    #[Route('/apartment/create', name: 'app_apartment_create')]
    public function create(Request $request): Response
    {
        $newApartments = new Apartment();
        $form = $this->createForm(ApartmentType::class, $newApartments);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $newApartments = $form->getData();

            $this->em->persist($newApartments);
            $this->em->flush();

            $this->addFlash(BaseController::FL_SUCCESS, 'Apartman byl úspěšně přidá');
            return $this->redirectToRoute('app_apartment_list', []);
        }
        return $this->render('admin/apartment/create.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
