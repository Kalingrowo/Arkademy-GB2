<?php
  // create school object
  class school
  {
    function school($hs, $u)
    {
      $this->highSchool = $hs;
      $this->university = $u;
    }
  }

  // create skills object
  class skills
  {
    function skills($name, $rate)
    {
      $this->name = $name;
      $this->rate = $rate;
    }
  }

  // create MyBio object and return as JSON
  class MyBio
  {
    function MyBio() {
      $this->name = "Muhammad Rum Rowi Rizqon"; //(String)
      $this->address = "Gebang Wetan 23C, Sukolilo, Surabaya"; //(String)
      $this->hobbies = ['reading', 'traveling', 'solve the problems'];//(Array)
      $this->is_married = false; //(Boolean)
      $this->school = new school("VHS 1 Boyolangu", "PENS"); //(Obj) with key highSchool, and university

      $skill1 = new skills("php", 8); // create skill set object
      $skill2 = new skills("mysql", 7); // create skill set object
      $skill3 = new skills("laravel", 6); // create skill set object
      $skills = array($skill1, $skill2, $skill3); // create array of object
      $this->skills = $skills; //(Array of Obj)

      $x = json_encode($this);
      return $x;

    }

  }

  $result = new MyBio();
  echo $result->MyBio();
?>
