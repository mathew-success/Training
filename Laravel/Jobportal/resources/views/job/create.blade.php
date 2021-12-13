@extends('layouts.employer.app')

@section('content')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-md-5">
				<div class="row">
                    <div class="col-sm-10 text-left">
                        <h4>Post Job</h4>
                    </div>
					<div class="col-sm-2 text-right">
						<a href="{{route('job.index')}}" class="btn btn-sm btn-primary">View List</a>
					</div>
                </div>
				<br/>
				@if(session('message'))
				<div class="alert alert-success alert-dismissible">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					{{ session('message') }}
				</div>
				@endif
				@if($errors->any())
					<div class="alert alert-danger">
						@foreach($errors->all() as $error)
							{{ $error }}<br/>
						@endforeach
					</div>
				@endif
				<br/>
				<form action="{{route('job.store')}}" method="POST" enctype="multipart/form-data">
				@csrf
					<div class="row">
						<div class="col-sm-3">
							<label>Title : </label>
							<input type="text" name="title" id="" value="{{old('title')}}" class="form-control">
							<br/>
						</div>
						<div class="col-sm-3">
							<label>Experience From : </label>
							<input type="text" name="experience_from" id="" value="{{old('experience_from')}}" class="form-control">
							<br/>
						</div>
						<div class="col-sm-3">
							<label>Experience To : </label>
							<input type="text" name="experience_to" id="" value="{{old('experience_to')}}" class="form-control">
							<br/>
						</div>
						<div class="col-sm-3">
							<label>Location : </label>
							<input type="text" name="job_location" id="" value="{{old('job_location')}}" class="form-control">
							<br/>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4">
							<label>Job Type : </label>
							<input type="text" name="job_type" id="" value="{{old('job_type')}}" class="form-control">
							<br/>
						</div>
						<div class="col-sm-4">
							<div class="" style="margin: 10% 20%;">
								<input type="checkbox" name="leave_saturday" value="1" id="">
								<label class="form-check-label" for="flexCheckDefault">
								Leave on saturday
								</label>
							</div>
							<br/>
						</div>
						<div class="col-sm-4">
							<label>Working hours per week : </label>
							<input type="text" name="working_hours_per_week" id="" value="{{old('working_hours_per_week')}}" class="form-control">
							<br/>
						</div>
						<div class="col-sm-12">
							<label>Description : </label>
							<textarea name="description" class="form-control">{{old('description')}}</textarea>
							<br/>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-4">
							<label>Job Role : </label>
							<input type="text" name="work_role" id="" value="{{old('work_role')}}" class="form-control">
							<br/>
						</div>
						<div class="col-sm-4">
							<label>Communication : </label>
							<select name="communication" class="form-control">
								<option value="English">English</option>
								<option value="Tamil">Tamil</option>
							</select>
							<br/>
						</div>
						<div class="col-sm-4">
							<label>Company : </label>
							<select name="company_id" class="form-control">
								<option value="">select--</option>
								@foreach($companies as $company)
								<option value="{{ $company->id }}">{{ $company->company_name }}</option>
								@endforeach
							</select>
							<br/>
						</div>
					</div>
					<hr/>
					<h4>Add Skills</h4>
					<br/>
					<div class="row">
						<div class="col-sm-12">
							<label>Skills : </label>
							<select class="form-control skills" name="skills[]" multiple="multiple">
								<option value="">Select--</option>
								@foreach($skills as $skill)
								<option value="{{ $skill->skills }}">{{ $skill->skills }}</option>
								@endforeach
							</select>
							<br/>
						</div>
					</div>
					<hr/>
					<h4>Qualifications</h4>
					<br/>
					<div class="row">
						<div class="col-sm-3">
							<label>Higher Secondary : </label>
							<input type="text" name="higher_secondary" id="" value="{{old('higher_secondary')}}" class="form-control">
							<br/>
						</div>
						<div class="col-sm-3">
							<label>Additional Info : </label>
							<input type="text" name="secondary" id="" value="{{old('secondary')}}" class="form-control">
							<br/>
						</div>
						<div class="col-sm-3">
							<label>Degree : </label>
							<input type="text" name="degree" id="" value="{{old('degree')}}" class="form-control">
							<br/>
						</div>
						<div class="col-sm-3">
							<label>Specialization : </label>
							<input type="text" name="specialization" id="" value="{{old('specialization')}}" class="form-control">
							<br/>
						</div>
						<div class="col-sm-3">
							<label>Passed out from : </label>
							<select name="passed_out_from" class="form-control">
								<option value="">Select--</option>
								<option value="2000">2000</option>
								<option value="2001">2001</option>
								<option value="2002">2002</option>
								<option value="2003">2003</option>
								<option value="2004">2004</option>
								<option value="2005">2005</option>
								<option value="2006">2006</option>
								<option value="2007">2007</option>
								<option value="2008">2008</option>
								<option value="2009">2009</option>
								<option value="2010">2010</option>
								<option value="2011">2011</option>
								<option value="2012">2012</option>
								<option value="2013">2013</option>
								<option value="2014">2014</option>
								<option value="2015">2015</option>
								<option value="2016">2016</option>
								<option value="2017">2017</option>
								<option value="2018">2018</option>
								<option value="2019">2019</option>
								<option value="2020">2020</option>
								<option value="2021">2021</option>
							</select>
							<br/>
						</div>
						<div class="col-sm-3">
							<label>Passed out to : </label>
							<select name="passed_out_to" class="form-control">
								<option value="">Select--</option>
								<option value="2000">2000</option>
								<option value="2001">2001</option>
								<option value="2002">2002</option>
								<option value="2003">2003</option>
								<option value="2004">2004</option>
								<option value="2005">2005</option>
								<option value="2006">2006</option>
								<option value="2007">2007</option>
								<option value="2008">2008</option>
								<option value="2009">2009</option>
								<option value="2010">2010</option>
								<option value="2011">2011</option>
								<option value="2012">2012</option>
								<option value="2013">2013</option>
								<option value="2014">2014</option>
								<option value="2015">2015</option>
								<option value="2016">2016</option>
								<option value="2017">2017</option>
								<option value="2018">2018</option>
								<option value="2019">2019</option>
								<option value="2020">2020</option>
								<option value="2021">2021</option>
							</select>
							<br/>
						</div>
					</div>

					<button type="submit" class="btn btn-success btn-block">Save</button>
				</form>
            </div>
        </div>
    </div>

<script>
	$('.skills').select2({
		tags: true
	});
</script>
@endsection