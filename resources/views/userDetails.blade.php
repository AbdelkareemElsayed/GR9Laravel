<h1>  USER Info ....  </h1>
<br>


<?php  

   /*foreach($details   as $key => $value){

       echo '* '.$key.' : '.$value.'<br>';
   }
   
   
   {{   }}   // htmlspecialchars 
   {!! !!}
   */

?>


  @foreach($details   as $key => $value)

     {!! '* '.$key.' : '.$value.'<br>'  !!}
    
  @endforeach




<h1>  USER Cities ....  </h1>
<br>


<?php  

   foreach($city   as $key => $value){

       echo '* '.$value.'<br>';
   }

?>





<?php 

//   if(){


//   }


$age = 21;


/*
if(isset()){

}
*/


?>



@if($age == 20)
{{ "age = 20" }}
@elseif($age > 20)
{{  "age > 20 " }}
@else 
{{ "age < 20" }}
@endif



{{-- 
@isset()
@endisset


@empty() 
@endempty --}}

<br>

@for($i= 0; $i<3;$i++)
{{ $i }}
@endfor
