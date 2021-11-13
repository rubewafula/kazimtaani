@extends('layouts.backend')

@section('content')
    <div class="freeze">
	<h2 class="title-1">Download Registrations Report</h2>
    </div>
    <hr/>
    <div class="row">
    <div class="container " style="padding-left:0px">
       <form name="report-form" action="/admin/reports" action="post" >
	<div class="item form-group">
	    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="report_download"> From: </label>
	    <div class="col-md-6 col-sm-6 col-xs-12">
		<input type="text" id="date_from" name="from_date" value="" required="required" class="form-control">
	    </div>
	</div>
	<div class="item form-group">
	    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="report_download"> To: </label>
	    <div class="col-md-6 col-sm-6 col-xs-12">
		<input type="text" id="date_to" name="to_date" value="" required="required" class="form-control">
	    </div>
	</div>
	<div class="item form-group">
	    <div class="col-md-6 col-sm-6 col-xs-12">
		<input type="radio" name="dl_format" value="CSV" checked="checked"> Excel<br>
		<input type="radio" name="dl_format" value="PDF"> Pdf<br>
		<input type="radio" name="dl_format" value="HTML"> Html
	    </div>
	</div>
	<div class="item form-group">
	    <div class="col-md-6">
		<input  id="submit" type="submit" class="btn btn-secondary" value="Generate Report" />
	    </div>
	</div>
    </form>
</div>
</div> <!-- close container -->
@endsection
