<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\MeasurementRepository;
use App\Entity\Location;

class WeatherController extends AbstractController
{
    //#[Route('/weather', name: 'app_weather')]
    public function cityAction(Location $city, MeasurementRepository $measurementRepository): Response
    {
        $measurements = $measurementRepository->findByLocation($city);
        return $this->render('weather/city.html.twig', [
            'location' => $city,
            'measurements' => $measurements,
        ]);
    }
}
