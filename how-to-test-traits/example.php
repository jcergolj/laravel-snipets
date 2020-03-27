<?php

// 1. version - bad one

// Leg.php
trait Leg
{
    public function numberOfLegs()
    {
        return 4;
    }
}

// Dog.php
class Dog
{
    use Leg; 
}

// Cat.php
class Cat
{
    use Leg;
}

// DogTest.php
class DogTest
{
    /** @test */
    function dog_has_four_legs()
    {
        $dog = new Dog;
        $this->assertSame(4, $dog->numberOfLegs());
    }
}

// CatTest.php
class CatTest
{
    /** @test */
    function cat_has_four_legs()
    {
        $cat = new Cat;
        $this->assertSame(4, $cat->numberOfLegs());
    }
}


// 2. improved version
class LegTest
{
    /** @test */
    function animal_has_four_legs()
    {
        $animal = new class () {
            use Leg;
        };
        
        $this->assertSame(4, $animal->numberOfLegs());
    }
}

// DogTest.php
class DogTest
{
    /** @test */
    function assert_dog_uses_leg_trait()
    {
        $this->assertContains(Leg::class, class_uses(Dog::class));
    }
}

// CatTest.php
class CatTest
{
    /** @test */
    function assert_cat_uses_leg_trait()
    {
        $this->assertContains(Leg::class, class_uses(Cat::class));
    }
}


