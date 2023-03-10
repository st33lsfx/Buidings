<?php

namespace App\Controller;

use App\Repository\Apartment\ApartmentRepository;
use App\Repository\Building\BuildingRepository;
use App\Repository\Person\PersonRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApiController extends AbstractController
{
    private BuildingRepository $buildingRepository;
    private PersonRepository $personRepository;

    public function __construct(BuildingRepository $buildingRepository, PersonRepository $personRepository)
    {
        $this->buildingRepository = $buildingRepository;
        $this->personRepository = $personRepository;
    }

    /**
     * @Route("api/building/",name="api_list_buildings")
     */
    public function apiListBuildings(): Response
    {
        $buildings = $this->buildingRepository->findAll();
        $data = [];

        foreach ($buildings as $building) {
            $data[] = [
                'id' => $building->getId(),
                'title' => $building->getTitle(),
                'city' => $building->getCity(),
                'address' => $building->getAddress(),
                'descriptionNumber' => $building->getDescriptionNumber(),
                'postZip' => $building->getPostZip()
            ];
        }
        return $this->json($data);
    }

    /**
     * @Route("api/apartment/{id}",name="api_list_apartment")
     */
    public function apiListApartment($id): Response
    {
        $building = $this->buildingRepository->findOneBy(['id' => $id]);
        $data = [];


        foreach ($building->getApartments() as $key => $apartment) {
            $data[$key] = [
                'id' => $apartment->getId(),
                'building' => [
                    'id' => $apartment->getBuilding()->getId(),
                    'title' => $apartment->getBuilding()->getTitle()
                ],
                'title' => $apartment->getTitle(),
                'size' => $apartment->getSize(),
                'cold_water_status' => $apartment->getColdWaterStatus(),
                'hot_water_status' => $apartment->getHotWaterStatus(),
                'gas_meter_status' => $apartment->getGasMeterStatus(),
                'square_meter' => $apartment->getSquareStatus()
            ];
            if ($apartment->getPerson()) {
                $data[$key]['person'] = [
                    'id' => $apartment->getPerson()->getId(),
                    'first_name' => $apartment->getPerson()->getFirstName(),
                    'last_name' => $apartment->getPerson()->getLastName()
                ];
            }

        }

        return $this->json($data, Response::HTTP_OK, [], ['groups' => 'building', 'apartment', 'person']);
    }

    /**
     * @Route("api/person/{id}",name="api_list_person")
     */
    public function apiListPerson(int $id): Response
    {
        $person = $this->personRepository->findOneBy(['id' => $id]);
        $data = [];

        $data[] = [
            'id' => $person->getId(),
            'first_name' => $person->getFirstName(),
            'last_name' => $person->getLastName(),
            'email' => $person->getEmail(),
            'phone' => $person->getPhone()
        ];

        return $this->json($data);
    }
}
