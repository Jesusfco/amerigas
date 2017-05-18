
<div class="slider">
    <ul class="slides">
      @if(isset($mov))
      
        <li>
          <img src="images/mov/slider/1.jpg"> 
        <div class="caption center-align uno">
            
          <h3>Our company was born to create and develop energy projects</h3>
          <h5 class="light grey-text text-lighten-3">Watch our resume</h5>
        </div>
      </li>
      <li>
        <img src="images/mov/slider/2.jpg">  
        <div class="caption center-align dos">
            
          <h3>In colaboration with enterprises of hight prestige</h3>
          <h5 class="light grey-text text-lighten-3">Developing functional structures</h5>
        </div>
      </li>
      <li>
        <img src="images/mov/slider/3.jpg">   
        <div class="caption center-align tres">
        
          <h3>Design and implementation of security systems </h3>
          <h5 class="light grey-text text-lighten-3">Professional experience</h5>
        </div>
      </li>
      @else
      <li>
          <img src="images/slider/1.jpg"> 
        <div class="caption center-align uno">
            
          <h3>Our company was born to create and develop energy projects</h3>
          <h5 class="light grey-text text-lighten-3">Watch our resume</h5>
        </div>
      </li>
      <li>
        <img src="images/slider/2.jpg">  
        <div class="caption center-align dos">
            
          <h3>In colaboration with enterprises of hight prestige</h3>
          <h5 class="light grey-text text-lighten-3">Developing functional structures</h5>
        </div>
      </li>
      <li>
        <img src="images/slider/3.jpg">   
        <div class="caption center-align tres">
        
          <h3>Design and implementation of security systems </h3>
          <h5 class="light grey-text text-lighten-3">Professional experience</h5>
        </div>
      </li>
      @endif
      
    </ul>
  </div>


<style>
  .slider .indicators .indicator-item.active{
    background-color: #2b69ce;
  }
</style>
    