    <div class="looder"  id="lodder">
  <div class = "centered">
  <div class = "blob-1"></div>
  <div class = "blob-2"></div>
</div>

<!--   <script src="{{url('lib/bootstrap/js/bootstrap.min.js')}}"></script>
 -->
<!--    <script src="http://www.codermen.com/js/jquery.js"></script>
 -->
  <script src="{{URL::asset('lib/bootstrap/js/bootstrap.min.js')}}"></script>
  <script class="include" type="text/javascript" src="{{URL::asset('lib/jquery.dcjqaccordion.2.7.js')}}"></script>
  <script src="{{URL::asset('lib/fancybox/jquery.fancybox.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>

  <script src="{{URL::asset('lib/jquery.scrollTo.min.js')}}"></script>
  <script src="{{URL::asset('lib/jquery.nicescroll.js')}}" type="text/javascript"></script>
  <script src="{{URL::asset('lib/jquery.sparkline.js')}}"></script>
  <!--common script for all pages-->
  <script src="{{URL::asset('lib/common-scripts.js')}}"></script>
  <script type="text/javascript" src="{{URL::asset('lib/gritter/js/jquery.gritter.js')}}"></script>
  <script type="text/javascript" src="{{URL::asset('lib/gritter-conf.js')}}"></script>
  <!--script for this page-->
   <script type="text/javascript" src="{{URL::asset('js/validation.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('js/organisationvalidation.js')}}"></script>
  <script src="{{URL::asset('lib/sparkline-chart.js')}}"></script>      
  <script src="{{URL::asset('lib/zabuto_calendar.js')}}"></script>
  <script src="http://parsleyjs.org/dist/parsley.js"></script>
  <script src="{{URL::asset('lib/field_validation.js')}}"></script>
  <img src="{{url('/img/download.jpg')}}" alt="Image"/>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
   <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>



  <script type="application/javascript">
    $(document).ready(function() {
      $("#date-popover").popover({
        html: true,
        trigger: "manual"
      });
      $("#date-popover").hide();
      $("#date-popover").click(function(e) {
        $(this).hide();
      });

      $("#my-calendar").zabuto_calendar({
        action: function() {
          return myDateFunction(this.id, false);
        },
        action_nav: function() {
          return myNavFunction(this.id);
        },
        ajax: {
          url: "show_data.php?action=1",
          modal: true
        },
        legend: [{
            type: "text",
            label: "Special event",
            badge: "00"
          },
          {
            type: "block",
            label: "Regular event",
          }
        ]
      });
    });

    function myNavFunction(id) {
      $("#date-popover").hide();
      var nav = $("#" + id).data("navigation");
      var to = $("#" + id).data("to");
      console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }
  </script>




   <script type="text/javascript">
      $(document).ready(function(){
        setTimeout(function(){ 
         $('#lodder').fadeOut("slow");
        }, 1000);
        
      })         
     </script>




<!-- //kamal datatable -->

  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
   <script type="text/javascript">
   $(document).ready( function () {
    $('#table_id').DataTable();
});
   </script>

<script>
  $(function () {
            //    fancybox
            jQuery(".fancybox").fancybox();
        });

  $('.autoplay').slick({
            prevArrow: $('.prev'),
            nextArrow: $('.next'),
            slidesToShow: 5,
            slidesToScroll: 1,
            autoplay: false,
            autoplaySpeed: 2000,
            infinite: false,
            speed: 300,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        infinite: true,

                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
               
            ]

        });
  
</script>

<script>
$(document).ready(function(){
 $('#framework').multiselect({
  nonSelectedText: 'Select Days',
  enableFiltering: true,
  enableCaseInsensitiveFiltering: true,
  buttonWidth:'100%'
 });
 let availableWeekDays=$('#availableWeekDays').val();
 let availableDaysArray=availableWeekDays.split(',');
 $("#framework").val(availableDaysArray);
  $("#framework").multiselect("refresh");
});
</script>


 <script type="text/javascript">
    $('.timepicker').datetimepicker({
        format: 'HH:mm:ss'
    }); 
</script>  







 
  



