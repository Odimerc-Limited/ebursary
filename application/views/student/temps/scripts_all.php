</div>
</body>

<script type="text/javascript" src="<?php echo base_url('assets/bower_components/jquery/dist/core.js') ?>"></script>
<script type="text/javascript"
        src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js') ?>"></script>
<script type="text/javascript"
        src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.slim.js') ?>"></script>
<script type="text/javascript"
        src="<?php echo base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('assets/material/js/material.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/external/datatable.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/external/material_data_table.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/custom.js') ?>" type="text/javascript"></script>


<script type="text/javascript">
    $(document).ready(function () {

        $(".change_look_feel").click(function () {
            $(".apply-btn").removeClass('mdl-color--accent').addClass('mdl-color--primary');
        });

    });
</script>

</html>