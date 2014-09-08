
    <div class="container">

      <div class="row">
        <div class="col-lg-3 col-xs-3 right_widget">
          <div class="team_data">
          <h3 class="title">Sport  (5)</h3>
          <ul class="listing">
              <li>
                <input type="checkbox" name="option1" value="Football"> Football 
                <span>(57)</span>
              </li>
              <li>
                <input type="checkbox" name="option2" value="Tennis"> Tennis 
                <span>(20)</span>
              </li>
          </ul>
        </div>
        <!-- end team data ======================================== -->
        <div class="team_data">
          <h3 class="title">Team  (120)</h3>
          <ul class="listing">
              <li>
                <input type="checkbox" name="option1" value="Barcelona"> Barcelona 
                <span>(5)</span>
              </li>
              <li>
                <input type="checkbox" name="option2" value="Real Madrid"> Real Madrid 
                <span>(4)</span>
              </li>
              <li>
                <input type="checkbox" name="option3" value="Basiktas"> Basiktas 
                <span>(5)</span>
              </li>
          </ul>
        </div>
        <!-- end team data ======================================== -->
        <div class="team_data">
          <h3 class="title">League  (35)</h3>
          <ul class="listing">
              <li>
                <input type="checkbox" name="option1" value="Premier League "> Premier League 
                <span>(90)</span>
              </li>
              <li>
                <input type="checkbox" name="option2" value="Tennis"> Tennis 
                <span>(20)</span>
              </li>
          </ul>
        </div>
        <!-- end team data ======================================== -->
        <div class="team_data">
          <h3 class="title">Channel  (20)</h3>
          <ul class="listing">
              <li>
                <input type="checkbox" name="option1" value="LigTV"> LigTV 
                <span>(60)</span>
              </li>
              <li>
                <input type="checkbox" name="option2" value="TRT3 sport"> TRT3 sport 
                <span>(42)</span>
              </li>
          </ul>
        </div>
        <!-- end team data ======================================== -->
        </div><!-- /.col-lg-3-->
        <div class="col-lg-9 col-xs-9">
          <?php  $this->renderPartial('_ajaxFilter',array('model'=>$model));
  
   ?>
            
            
        </div><!-- /.col-lg-9 -->
        
      </div><!-- /.row -->
    </div>
<div class="clearfix"></div>
<script>
  jQuery(document).ready(function(){
    $(document).on('click','.heading',function(){
     
     $(this).next().toggleClass('show_block');
    });
   
  });
</script>
<style>
.show_block{
  display: none;
}
</style>