<?php $fileno = $project->project_fileno ? $project->project_fileno : $project->project_number ?>
<?php 
	use App\component\Content;
	if ($title == "Query") {
		$title = "Request Cash Advance for Entrance Fee & Expenses";
	}else{
		$title = $title;
	}
?>
@extends('layout.backend')
@section('title', $project['project_prefix']."-".$fileno ."-". $title)
@section('content')
	<div class="container">
		@include('admin.report.headerReport')
		<div class="col-lg-12">
			<div class="pull-right hidden-print">
				<a href="javascript:void(0)" onclick="window.print();"><span class="fa fa-print btn btn-primary"></span></a>
			</div>		
			<h3 class="text-center"><span style="text-transform:uppercase; text-decoration:underline; font-weight: 700;">{{$title}}</span></h3><br><br>
			<span class="pull-left text-right">
				<p><b style="font-size: 13px;"> Pay To: &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;...............................</b></p>
				</span>

			<span class="pull-right text-right">
				<p><b style="font-size: 13px;"> No.: .........................</b></p>
				<b style="font-size: 16px; color: #607D8B;">{{date('d/F/Y')}}</b></span>
			<table class="table table-bordered">
				<tr>
					<td style="width:50%;">
						<p><label style="width:90px; margin-bottom:0px;">File No.:</label> {{$project->project_prefix}}-{{$fileno}}</p>
						<p><label style="width:90px; margin-bottom:0px;">Client Name:</label> {{$project->project_client}}</p>
						<p><label style="width:90px; margin-bottom:0px;">Tour Date:</label> {{Content::dateformat($project->project_start)}} - {{Content::dateformat($project->project_end)}}</p>
					</td>
					<td style="width:50%;">
						<p><label style="width:106px; margin-bottom: 0px;">Agent Name:</label> {{{$project->supplier->supplier_name or ''}}}</p>
						<p><label style="width:106px; margin-bottom: 0px;">Reference No.:</label> {{$project->project_client}}</p>
						
						<p><label style="width:106px; margin-bottom: 0px;">
						@if(isset($project->flightDep->dep_time))
							Flight No./Arrival:</label> {{{$project->flightDep->flightno or ''}}} - {{{$project->flightDep->dep_time or ''}}}, &nbsp;&nbsp;  
						@endif
						@if(isset($project->flightDep->arr_time))
							<b>Flight No./Departure:</b> {{{$project->flightArr->flightno or ''}}} - {{{$project->flightDep->arr_time or ''}}}
						@endif
						</p>
					</td>
				</tr>
			</table>
			
			<table class="table operation-sheed table-bordered">
				<tr class="header-row">
					<th width="10px">No.</th>
					<th style="width: 13%;">Date</th>
					<th>Description</th>
					<th>Service Name</th>
					<th class="text-center">Qty</th>
					<th class="text-center">Price {{Content::currency()}}</th>
					<th class="text-center">Amount</th>
					<th class="text-center">Price {{Content::currency(1)}}</th>
					<th class="text-center">Amount</th>
				</tr>
				<?php 
					$n = 0;
				?>
				@if($hotelb->get()->count() > 0)
					@foreach($hotelb->get() as $hb)
					<?php 
						$hbook = \App\Booking::find($hb->book_id);
						$n++;
						if (!empty($hb->nsingle) && $hb->nsingle != 0) {
							$hprice = $hb->nsingle;
						}elseif (!empty($hb->ntwin) && $hb->ntwin != 0) {
							$hprice = $hb->ntwin;
						}elseif(!empty($hb->ndouble) && $hb->ndouble != 0){
							$hprice = $hb->ndouble;
						}elseif (!empty($hb->nextra) && $hb->nextra != 0) {
							$hprice = $hb->nextra;
						}else{
							$hprice = $hb->nchextra;
						}					
					?>
					<tr>
						<td class="text-center">{{$n}}</td>
						<td>{{Content::dateformat($hb->checkin)}} -> {{Content::dateformat($hb->checkin)}}</td>
						<td>{{{$hb->hotel->supplier_name or ''}}}</td>
						<td>{{{$hb->room->name or ''}}}</td>
						<td class="text-center">{{$hb->book_day}}</td>
						<td class="text-right">{{$hprice}}</td>
						<td class="text-right">{{$hb->net_amount}}</td>
						<td class="text-right"></td>
						<td class="text-right"></td>
					</tr>
					@endforeach
				@endif

				@if($flightb->get()->count() > 0)
					@foreach($flightb->get() as $fb)
					<?php 
						$n++;
					?>
					<tr>
						<td class="text-center">{{$n}}</td>
						<td>{{Content::dateformat($fb->book_checkin)}}</td>
						<td>{{{$fb->supplier->supplier_name or ''}}}</td>
						<td>{{{$fb->fagent->supplier_name or ''}}}</td>				
						<td class="text-center">{{$fb->book_pax}}</td>
						<td class="text-right">{{Content::money($fb->book_price)}}</td>
						<td class="text-right">{{Content::money($fb->book_namount)}}</td>
						<td class="text-right">{{Content::money($fb->book_nkprice)}}</td>
						<td class="text-right">{{Content::money($fb->book_kamount)}}</td>
					</tr>
					@endforeach
				@endif

				@if($golfb->get()->count() > 0)
					@foreach($golfb->get() as $gb)
					<?php 
						$n++;
					?>
					<tr>
						<td class="text-center">{{$n}}</td>
						<td>{{Content::dateformat($gb->book_checkin)}}</td>
						<td>{{{$gb->golf->supplier_name or ''}}}</td>
						<td >{{{$gb->golf_service->name or ''}}}</td>
						<td class="text-center">{{$gb->book_pax}}</td>
						<td class="text-right">{{Content::money($gb->book_nprice)}}</td>
						<td class="text-right">{{Content::money($gb->book_namount)}}</td>
						<td class="text-right">{{Content::money($gb->book_nkprice)}}</td>
						<td class="text-right">{{Content::money($gb->book_nkamount)}}</td>
						
					</tr>
					@endforeach
				@endif

				@if($cruiseb->get()->count() > 0)
					@foreach($cruiseb->get() as $cb)
					<?php 
						$n++;
						if (!empty($cb->nsingle) && $cb->nsingle != 0) {
							$hprice = $cb->nsingle;
						}elseif (!empty($cb->ntwin) && $cb->ntwin != 0) {
							$hprice = $cb->ntwin;
						}elseif(!empty($cb->ndouble) && $cb->ndouble != 0){
							$hprice = $cb->ndouble;
						}elseif (!empty($cb->nextra) && $cb->nextra != 0) {
							$hprice = $cb->nextra;
						}else{
							$hprice = $cb->nchextra;
						}		
					?>
					<tr>
						<td class="text-center">{{$n}}</td>
						<td>{{Content::dateformat($cb->checkin)}} - {{Content::dateformat($cb->checkout)}}</td>
						<td>{{{$cb->cruise->supplier_name or ''}}}</td>
						<td>{{{$cb->program->program_name or ''}}}</td>
						<td class="text-center">{{$cb->book_day}}</td>
						<td class="text-right">{{Content::money($hprice)}}</td>
						<td class="text-right">{{Content::money($cb->net_amount)}}</td>
						<td></td>
						<td></td>
					</tr>
					@endforeach
				@endif
 
				@if($transportb->get()->count() >0)
					@foreach($transportb->get() as $bk)
					<?php 
						$n++; 
						$dateb = \App\Booking::find($bk->book_id);
						$price = isset($bk->price)? $bk->price:0; 
						$kprice = isset($bk->kprice)? $bk->kprice:0;
						$service = \App\TransportService::find($bk->service_id);
						$vehicle = \App\TransportMenu::find($bk->vehicle_id);
					?>
					<tr>	
						<td class="text-center">{{$n}}</td>
						<td>{{Content::dateformat($dateb->book_checkin)}}</td>
						<td>{{{$service->title or ''}}}</td>
				        <td>{{{$vehicle->name or ''}}}</td>
						<td class="text-center"></td>
						<td class="text-right">{{Content::money($price)}}</td>
						<td class="text-right">{{Content::money($price)}}</td>
						<td class="text-right">{{Content::money($kprice)}}</td>
						<td class="text-right">{{Content::money($kprice)}}</td>
					</tr>
					@endforeach
				@endif

				@if($guideb->get()->count() > 0)
					@foreach($guideb->get() as $bg)
					<?php 
						$n++; 
						$dateb = \App\Booking::find($bg->book_id);
						$price = isset($bg->price)?$bg->price :0;
						$kprice = isset($bg->kprice)? $bg->kprice :0;
						$sb = \App\GuideService::find($bg->service_id);
						$supb = \App\Supplier::find($bg->sup_id);
						$langb = \App\GuideLanguage::find($bg->language_id);
					?>
					<tr>	
						<td class="text-center">{{$n}}</td>
						<td>{{Content::dateformat($dateb->book_checkin)}}</td>
						<td>{{{$sb->title or ''}}}</td>
				        <td>{{{$langb->name or ''}}}</td>
						<td></td>
						<td class="text-right">{{Content::money($price)}}</td>
						<td class="text-right">{{Content::money($price)}}</td>
						<td class="text-right">{{Content::money($kprice)}}</td>
						<td class="text-right">{{Content::money($kprice)}}</td>
					</tr>
					@endforeach
				@endif

				@if($restaurantb->get()->count() > 0)
					@foreach($restaurantb->get() as $rb)
					<?php $n++; ?>
					<tr>	
						<td class="text-center">{{$n}}</td>
						<td>{{Content::dateformat($rb->start_date)}}</td>
						<td>{{{$rb->supplier->supplier_name or ''}}}</td>         
					    <td>{{{$rb->rest_menu->title or ''}}}</td>
					    <td class="text-center">{{$rb->book_pax}}</td>
						<td class="text-right">{{Content::money($rb->price)}}</td>
		                <td class="text-right">{{Content::money($rb->amount)}}</td>
		                <td class="text-right">{{Content::money($rb->kprice)}}</td>
	                  	<td class="text-right">{{Content::money($rb->kamount)}}</td>
					</tr>
					@endforeach
				@endif

				@if($entranb->get()->count() > 0)
					@foreach($entranb->get() as $rb)
					<?php $n++; ?>
					<tr>	
						<td class="text-center">{{$n}}</td>
						<td>{{Content::dateformat($rb->start_date)}}</td>
						<td>{{{$rb->entrance->name or ''}}}</td>       
						<td></td>
					    <td class="text-center">{{$rb->book_pax}}</td>
		                <td class="text-right">{{Content::money($rb->price)}}</td>
		                <td class="text-right">{{Content::money($rb->amount)}}</td>
		                <td class="text-right">{{Content::money($rb->kprice)}}</td>
	                  	<td class="text-right">{{Content::money($rb->kamount)}}</td>
					</tr>
					@endforeach
				@endif

				@if($miscb->get()->count() > 0)
					@foreach($miscb->get() as $misc)
					<?php $n++; 
						$dateb = \App\Booking::find($misc->book_id);
					?>
					<tr>	
						<td class="text-center">{{$n}}</td>
						<td>{{Content::dateformat($dateb->book_checkin)}}</td>
						<td >{{{$misc->servicetype->name or ''}}}</td>    
						<td></td>   
					    <td class="text-center">{{$misc->book_pax}}</td>
		                <td class="text-right">{{Content::money($misc->price)}}</td>
		                <td class="text-right">{{Content::money($misc->amount)}}</td>
		                <td class="text-right">{{Content::money($misc->kprice)}}</td>
	                  	<td class="text-right">{{Content::money($misc->kamount)}}</td>
					</tr>
					@endforeach
				@endif
				<tr>
					<td colspan="5" class="text-right" style="border-bottom: none; border-bottom: none; border-left:none border-right:none;" ></td>
					<th colspan="2" class="text-right" style="border-bottom: none; border-bottom: none; border-left:none;">
						<?php 
						$grandtotal = $hotelb->sum('net_amount') + $flightb->sum('book_namount') + $golfb->sum('book_namount') + 
									$cruiseb->sum('net_amount') + $transportb->sum('price') + $guideb->sum('price') + 
									$restaurantb->sum('amount') + $entranb->sum('amount') + 
									$miscb->sum('amount');
						?>
						@if($grandtotal > 0)
							Total {{Content::currency()}}: {{Content::money($grandtotal)}}
						@endif
					</th>
					<th colspan="2" class="text-right" style="border-bottom: none; border-bottom: none;">
						<?php 
						$ktotal = $flightb->sum('book_kamount') + $transportb->sum('kprice') + 
									$golfb->sum('book_kamount') + $guideb->sum('kamount') + 
									$restaurantb->sum('kamount') + $entranb->sum('kamount') + 
									$miscb->sum('kamount'); 
						?>
						@if($ktotal > 0 )
							Total {{Content::currency(1)}}: {{Content::money($ktotal)}}
						@endif
					</th>
				</tr>
				<tr>
					<th colspan="3">A/C Code (Cr.)</th>
					<th colspan="6">Cash/ Cheque</th>
				</tr>
				<tr>
					<th colspan="9"><br><br><br></th>
				</tr>
				
				<tr>
					<td colspan="2" style="border-top:none;border-left:none; border-right:none;">Prepared By:............................</td>
					<td style="border-top:none; border-right:none;border-left:none;">Approved By:............................</td>
					<td colspan="3" style="border-top:none; border-right:none;border-left:none;">Account:............................</td>
					<td colspan="2" style="border-top:none; border-right:none;border-left:none;">Cashier:............................</td>
					<td colspan="2" style="border-top:none; border-right:none;border-left:none;">Received By:............................</td>
				</tr>
			</table><br>
	  	</div>
	</div>
@endsection
