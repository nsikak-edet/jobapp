<?php $ci =& get_instance(); $msg = $ci->session->flashdata('success_cat'); if(isset($msg)):  ?>
    <div class="alert alert-success alert-styled-left alert-arrow-left alert-bordered">
        <button type="button" class="close" data-dismiss="alert"><span>x</span><span class="sr-only">Close</span></button>
        <span class="text-semibold">Well done!</span> Category has been added successfully.
    </div>
<?php endif; ?>

<div class="panel panel-flat">
    <div class="panel-group panel-group-control content-group-lg" id="accordion-control">
        <div class="panel panel-white">
            <div class="panel-heading">
                <h6 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion-control" href="#accordion-control-group1" aria-expanded="false" class="collapsed">Categories</a>
                    <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal_form_vertical">Add New Category <i class="icon-plus3 position-right"></i></button>
                </h6>
            </div>
        </div>

        <div class="panel panel-white">
            <div class="panel-heading">
                <h6 class="panel-title">
                    <a class="" data-toggle="collapse" data-parent="#accordion-control" href="#accordion-control-group2" aria-expanded="true">Sub Categories</a>
                    <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#sub-category-modal">Add New Sub-Category <i class="icon-plus3 position-right"></i></button>
                </h6>
            </div>

</div>