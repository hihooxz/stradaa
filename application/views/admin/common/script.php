<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url('asset/asset_default/plugins/jQuery/jquery-2.2.3.min.js')?>"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url('asset/asset_default/bootstrap/js/bootstrap.min.js')?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('asset/asset_default/dist/js/app.min.js')?>"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url('asset/asset_default/plugins/slimScroll/jquery.slimscroll.min.js')?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url('asset/asset_default/plugins/fastclick/fastclick.js')?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('asset/asset_default/dist/js/demo.js')?>"></script>
<!-- fullCalendar 2.2.5 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="<?php echo base_url('asset/asset_default/plugins/fullcalendar/fullcalendar.min.js')?>"></script>
<script src="<?php echo base_url('asset/asset_default/plugins/datepicker/bootstrap-datepicker.js')?>"></script>
<script src="<?php echo base_url('asset/asset_default/plugins/timepicker/bootstrap-timepicker.min.js')?>"></script>
<script>
$('#datepicker').datepicker({
    format:"d M yyyy",
      autoclose: true,
      todayBtn:"linked"
    });
    $(".timepicker").timepicker({
      defaultTime: '07:00',
    minuteStep: 1,
    disableFocus: true,
    template: 'dropdown',
    showMeridian:false

    });
    $(".timepicker2").timepicker({
      defaultTime: '07:00',
    minuteStep: 1,
    disableFocus: true,
    template: 'dropdown',
    showMeridian:false
    });
</script>
<?php

  $url=$this->uri->segment(2);
  if($url == "manage-schedule"){
?>

<script>
  $(function () {

    /* initialize the external events
     -----------------------------------------------------------------*/
    function ini_events(ele) {
      ele.each(function () {

        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
        // it doesn't need to have a start or end
        var eventObject = {
          title: $.trim($(this).text()) // use the element's text as the event title
        };

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject);

        // make the event draggable using jQuery UI
        // $(this).draggable({
        //   zIndex: 1070,
        //   revert: true, // will cause the event to go back to its
        //   revertDuration: 0  //  original position after the drag
        // });

      });
    }

    ini_events($('#external-events div.external-event'));

    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date();
    var d = date.getDate(),
        m = date.getMonth(),
        y = date.getFullYear();
    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay'
      },
      buttonText: {
        today: 'today',
        month: 'month',
        week: 'week',
        day: 'day'
      },
      //Random default events
      events: [
        <?php
          if($results!=FALSE){
            $i = 1;
            $count = $this->mod->countData('schedule');
            foreach ($results as $rows ) {
              ?>
              {
                title: '<?php echo $rows->subject.' \n '.$rows->class_name.' \n '.$rows->name_classroom?>',
                start: '<?php echo date('Y-m-d',strtotime($rows->date_schedule))." ".date('H',strtotime($rows->hour_start)).":".date('i',strtotime($rows->hour_end))?>',
                end: '<?php echo date('Y-m-d',strtotime($rows->date_schedule))?>',
                allDay: false,

                backgroundColor: "#f39c12", //yellow
                borderColor: "#f39c12" //yellow
              }
              <?php
              if($i!=$count){
                echo ",";
              }
              $i++;
            }
          }
         ?>
      ],
      editable: false,
      droppable: false, // this allows things to be dropped onto the calendar !!!
      drop: function (date, allDay) { // this function is called when something is dropped

        // retrieve the dropped element's stored Event Object
        var originalEventObject = $(this).data('eventObject');

        // we need to copy it, so that multiple events don't have a reference to the same object
        var copiedEventObject = $.extend({}, originalEventObject);

        // assign it the date that was reported
        copiedEventObject.start = date;
        copiedEventObject.allDay = allDay;
        copiedEventObject.backgroundColor = $(this).css("background-color");
        copiedEventObject.borderColor = $(this).css("border-color");

        // render the event on the calendar
        // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
        $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

        // is the "remove after drop" checkbox checked?
        if ($('#drop-remove').is(':checked')) {
          // if so, remove the element from the "Draggable Events" list
          $(this).remove();
        }

      }
    });

    /* ADDING EVENTS */

  });
</script>
<?php
}
?>
