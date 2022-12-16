<?php

/**
 * 
 * Template Name: Inquiry Form Data
 * 
 **/
get_header();

?>
<style>
.delete-btn {
    border: none;
    background: #dc3232;
    color: #fff;
    border-radius: 50%;
    width: 25px;
    height: 25px;
    text-align: center;
    line-height: 23px;
    font-weight: 100 !important;
}

</style>

<div class="page-content">
	<div class="section bg-norepeat bg-bottom bg-left bg-md-none bg-fixed section-bottom-padding-half ">
		<div class="banner-appointment-form">
			<div class="container">
				<div class="text-center mb-2  mb-md-3 mb-lg-4">
					<div class="h-sub theme-color">Inquiry</div>
					<h1>Data Table</h1>
					<div class="h-decor"></div>
				</div>
			</div>
			<div class="container-fluid">
				<table border="1" width="100%" cellpadding="10px" >
				  <tr>
				    <th >Id</th>
				    <th >Product Name</th>
				    <th >Requirement</th>
				    <th >Units</th>
				    <th >Remark</th>
				    <th >Name</th>
				    <th >Company Name</th>
				    <th >Phone</th>
				    <th >Email</th>
				    <th >Location</th>
				    <th >Country</th>
				    <th >State</th>
				    <th >City</th>
				    <th >Date</th>
				    <th >Delete</th>
				  </tr>
				  <tbody id="load-table"></tbody>
				</table>
			</div>
		</div>
	</div>





</div>
 <?php get_footer(); ?>