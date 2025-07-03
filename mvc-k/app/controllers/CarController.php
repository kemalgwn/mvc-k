<?php
require_once __DIR__ . '/../models/Car.php';

class CarController extends Controller {
    public function index() {
        $search = $_GET['search'] ?? '';
        $category = $_GET['category'] ?? '';

        $allCars = Car::findAll();

        $cars = array_filter($allCars, function($car) use ($search, $category) {
            $matchSearch = !$search || stripos($car->name, $search) !== false;
            $matchCategory = !$category || strcasecmp(trim($car->category), trim($category)) === 0;
            return $matchSearch && $matchCategory;
        });

        $categories = array_unique(array_map(fn($car) => $car->category, $allCars));

        $this->view('car/index', [
            'cars' => $cars,
            'categories' => $categories,
            'selectedCategory' => $category,
            'searchTerm' => $search
        ]);
    }


    public function details($id) {
        $car = Car::findById($id);
        if (!$car) {
            header('Location: /Mvc-k/public/index.php?url=car/index');
            exit;
        }
        $this->view('car/details', ['car' => $car]);
    }

    public function contact() {
        $this->view('pages/contact');
    }
}
