 <?php

// ==========================
// CLASS PERSON
// ==========================

class Person {

    public $firstName;
    public $lastName;

    function sayHello($name){
        echo "Hello $name, my name is $this->firstName $this->lastName <br>";
    }

    function sayGoodBye($name){
        echo "Good Bye $name <br>";
    }

}


// membuat object person
$eko = new Person();
$eko->firstName = "Eko";
$eko->lastName = "Eko";

$joko = new Person();
$joko->firstName = "Joko";
$joko->lastName = "Nugroho";

$budi = new Person();
$budi->firstName = "Budi";
$budi->lastName = "Nugraha";


// memanggil method
$eko->sayHello("Joko");
$joko->sayHello("Budi");
$budi->sayGoodBye("Eko");

echo "<br>";


// ==========================
// CLASS CAR
// ==========================

class Car {

    public $name;
    public $brand;

    function startEngine(){
        echo "Mobil $this->name dengan brand $this->brand mesin dinyalakan <br>";
    }

    function stopEngine(){
        echo "Mobil $this->name mesin dimatikan <br>";
    }

}


// membuat object car
$avanza = new Car();
$avanza->name = "Avanza";
$avanza->brand = "Toyota";

$almaz = new Car();
$almaz->name = "Almaz";
$almaz->brand = "Wuling";

$mobilio = new Car();
$mobilio->name = "Mobilio";
$mobilio->brand = "Honda";


// memanggil method
$avanza->startEngine();
$almaz->startEngine();
$mobilio->stopEngine();

?>