</div>
</body>

<script type="text/javascript"
        src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js') ?>"></script>
<script type="text/javascript"
        src="<?php echo base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('assets/material/js/material.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/datatables/jquery.dataTables.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/datatables/dataTables.responsive.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/datatables/responsive.bootstrap.min.js') ?>" type="text/javascript"></script>

<script src="<?php echo base_url('assets/select/select2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/external/custom.js') ?>" type="text/javascript"></script>


<script type="text/javascript">
    $("#checkall input").change(function() {
        var listaElementos = document.querySelectorAll('.check');

        for(var i=0, n=listaElementos.length; i<n; i++){
            var element = listaElementos[i];

            if($('#checkall input').is(":checked")) {
                element.MaterialCheckbox.check();
            }
            else {
                element.MaterialCheckbox.uncheck();
            }
        }
    });

    $('.check').change(function(){
        var listaElementos = document.querySelectorAll('.check');

        for(var i=0, n=listaElementos.length; i<n; i++){
            var element = listaElementos[i];
            if($('.check input:checked').length == $('.check input').length ) {
                document.querySelector('#checkall').MaterialCheckbox.check();
            }else{
                document.querySelector('#checkall').MaterialCheckbox.uncheck();
            }
        }
    });
</script>

<script type="text/javascript">
    $(".slide").each(function(i) {
        var item = $(this);
        var item_clone = item.clone();
        item.data("clone", item_clone);
        var position = item.position();
        item_clone
            .css({
                left: position.left,
                top: position.top,
                visibility: "hidden"
            })
            .attr("data-pos", i+1);

        $("#cloned-slides").append(item_clone);
    });

    $(".all-slides").sortable({

        axis: "y",
        revert: true,
        scroll: false,
        placeholder: "sortable-placeholder",
        cursor: "move",

        start: function(e, ui) {
            ui.helper.addClass("exclude-me");
            $(".all-slides .slide:not(.exclude-me)")
                .css("visibility", "hidden");
            ui.helper.data("clone").hide();
            $(".cloned-slides .slide").css("visibility", "visible");
        },

        stop: function(e, ui) {
            $(".all-slides .slide.exclude-me").each(function() {
                var item = $(this);
                var clone = item.data("clone");
                var position = item.position();

                clone.css("left", position.left);
                clone.css("top", position.top);
                clone.show();

                item.removeClass("exclude-me");
            });

            $(".all-slides .slide").each(function() {
                var item = $(this);
                var clone = item.data("clone");

                clone.attr("data-pos", item.index());
            });

            $(".all-slides .slide").css("visibility", "visible");
            $(".cloned-slides .slide").css("visibility", "hidden");
        },

        change: function(e, ui) {
            $(".all-slides .slide:not(.exclude-me)").each(function() {
                var item = $(this);
                var clone = item.data("clone");
                clone.stop(true, false);
                var position = item.position();
                clone.animate({
                    left: position.left,
                    top: position.top
                }, 200);
            });
        }

    });

</script>




<script type="text/javascript">
    function new_section() {
        $("#create_section").show();
    }
</script>

<script type="text/javascript">
    function open_filter1() {
        $(".q1").show();
        $(".filter1").hide();
        $(".filter2").show();

    }
</script>

<script type="text/javascript">
    function open_filter2() {
        $(".q2").show();
        $(".filter2").hide();
        $(".filter3").show();

    }
</script>

<script type="text/javascript">
    function open_filter3() {
        $(".q3").show();
        $(".filter3").hide();
        $(".filter4").show();

    }
</script>

<script type="text/javascript">
    function open_filter4() {
        $(".q4").show();
        $(".filter4").show();

    }
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $("#db-questions1").on('change', function () {
            var ans = document.getElementById("db-questions1").value;

            if(ans === 'Do you go to school')
            {
                $(".db-questions1-response").show();
                $(".section_quiz").html(ans);
                $(".db-questions1").hide();
            }
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $(".cancel_filter1").click(function () {
            $('#values1-toggle')
                .find('option')
                .remove()
                .css({"display":"none"});
            $('#db-questions1')
                .find('option')
                .remove()
                .end()
                .show();
           /* $('#values1-toggle')
                .find('option')
                .remove()
                .end();*/

            //$(".q1").css({"display":"block"});
        });
    });
</script>

<script type="text/javascript">
   $(document).ready(function () {
       $(".q1").click(function () {
           $(".q1-questions").show();
           $(".q1").hide();
       });
   });
</script>

<script type="text/javascript">
   $(document).ready(function () {

       $(".single_question").click(function () {
           $(".single_question").hide();
           $(".multiple_questions").hide();
           $("#single_answer").show();
       });

       $(".cancel-btn").click(function () {
           $(".single_question").show();
           $(".multiple_questions").show();
           $("#single_answer").hide();
       });

       $(".create-btn").click(function () {

           var quiz = document.getElementById('quiz').value;
           var response = document.getElementById('response').value;

           $("#p_title").html(quiz);
           $("#p_body").html(response);

           $("#q_id").show();
           $(".single_question").show();
           $(".multiple_questions").show();
           $("#single_answer").hide();
       });
   });
</script>



<script type="text/javascript">
    $(document).ready(function() {
        $(".js-example-basic-single").select2();
    });
</script>



</html>