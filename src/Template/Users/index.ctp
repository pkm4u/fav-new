<?php ?>
<section id="home-banner" class="no-padding">
        <div class="carousel slide carousel-fade" data-ride="carousel" id="banner-inner">
            <div class="carousel-inner">
                <div class="item active">
				    <img ng-src="{{base_url}}img/slide2.jpg" alt="villages in india" width="1920" height="1080">
                </div>
				<div class="item">
				    <img ng-src="{{base_url}}img/slide1.jpg" alt="best village in india" width="1920" height="1080">
                </div>
				<div class="item">
				    <img ng-src="{{base_url}}img/slide3.jpg" alt="india villages live" width="1920" height="1080">
                </div>
            </div><!--/.carousel-inner-->
			
        <div class="slider-caption">
<div class="container">
    <div class="row shadow"> 
        <div class="slider-cover col-md-8 col-md-offset-2 col-sm-12 text-center">
            <h1 class="page-title banner-title">Explore The Villages of India</h1> 
            <div class="main-search-bar form-group pos-relative search-form" data-toggle="tooltip" data-placement="bottom" title="Search here">
                <div class="srchicon"><i class="fa fa-search"></i></div>
                <input type="text" ng-change="searchBox();" ng-model="term" placeholder="Search your Village, Town, Block, District or State" class="form-control navsrch" name="search_string" id="search_string" >
                <div class="srloader" ng-show="uiloader"><i class="fa fa-spinner fa-pulse"></i></div>
                <ul class="autocomplete" ng-show="ui">
                <li ng-repeat="res in allRes" class="ui-menu-item"><a href='{{res.url}}'><i class='red fa fa-map-marker'></i>&nbsp;{{res.label}}<em>&nbsp;{{res.type}}</em> in <small>{{res.parent}}</small></a></li>
                </ul>
            </div>
            <ul class="list list-inline banner-facts">
              <li><span class="col-pink">600+</span> Districts</li>	
              <li><span class="col-pink">5000+</span> Blocks</li>	
              <li><span class="col-pink">6 Lakh +</span> Villages</li>
            </ul>
        </div>
        </div>
        </div>
    </div>
</div>   
</section>

<section class="search-padding filter">
    <div class="container">
        <div class="row">
            <div  class="col-md-12 alt-search">
                <div id="state" class="col-md-3 col-sm-6 col-xs-12">
                <p>State</p>
                <div class="btn-group custom-select cs-default" uib-dropdown>
                <button id="single-button" type="button" class="custom-select-val" uib-dropdown-toggle ng-disabled="disabled">                   
                	<div class="custom-select-item-content">{{stateTxt}}</div>
                </button>
                <ul class="dropdown-menu custom-select-list stroll-list cards" uib-dropdown-menu role="menu" aria-labelledby="single-button">
                <li class="past" ng-click="noevent($event);">
                    <input type="text" name="state" placeholder="Enter states name" ng-model="squery">
                </li>
                <li ng-repeat="state in states|filter:squery" class="past">
                    <div class="custom-select-item-content" ng-click="findDistrict(state.id,state.state_name)">{{state.state_name}}</div>
                </li>
                </ul>
                </div>
                
                
                
                </div>
                <div id="district" class="col-md-3 col-sm-6 col-xs-12">
                <p>District</p>
                <div class="btn-group custom-select cs-default" uib-dropdown >
                <button id="single-button-1" type="button" class="custom-select-val" uib-dropdown-toggle ng-disabled="disabled">                                   <div class="custom-select-item-content">{{districtTxt}}</div>
                </button>
                
                <ul class="dropdown-menu custom-select-list stroll-list cards" uib-dropdown-menu role="menu" aria-labelledby="single-button-1">
                <li class="past" ng-if="!districts">
                    <div class="custom-select-item-content">Select your State</div>
                </li>
                
                <li class="past" ng-click="noevent($event);">
                    <input type="text" name="district" placeholder="Enter district name" ng-model="dquery">
                </li>
                <li ng-repeat="district in districts|filter:dquery" class="past">
                     <div class="custom-select-item-content" ng-click="findBlock(district.id,district.district_name)">{{district.district_name}}</div>
                 </li>
                </ul>
                
                </div>
                </div>
                <div id="block" class="col-md-3 col-sm-6 col-xs-12">
                <p>Block</p>
                <div class="btn-group custom-select cs-default" uib-dropdown>
                <button id="single-button-2" type="button" class="custom-select-val" uib-dropdown-toggle ng-disabled="disabled">                                   <div class="custom-select-item-content">{{blockTxt}}</div>
                </button>
                <ul class="dropdown-menu custom-select-list stroll-list cards" uib-dropdown-menu role="menu" aria-labelledby="single-button-2">
                    <li class="past" ng-if="!blocks">
                      <div class="custom-select-item-content">Select your District</div>
                    </li>
                     <li class="past" ng-click="noevent($event);">
                    	<input type="text" name="block" placeholder="Enter block name" ng-model="bquery">
                	</li>   
                        
                    <li ng-repeat="block in blocks|filter:bquery" class="past">
                            <div class="custom-select-item-content" ng-click="findVillage(block.id,block.block_name)">{{block.block_name}}</div>
                    </li>
                </ul>
                    
                
                </div>
                </div>
                <div id="village" class="col-md-3 col-sm-6 col-xs-12">
                <p>Village</p>
                <div class="btn-group custom-select cs-default" uib-dropdown>
                <button id="single-button-3" type="button" class="custom-select-val" uib-dropdown-toggle ng-disabled="disabled">                                   <div class="custom-select-item-content">Select Village</div>
                </button>
                <ul class="dropdown-menu custom-select-list stroll-list cards" uib-dropdown-menu role="menu" aria-labelledby="single-button-3">
                <li class="past" ng-if="!villages">
                    <div class="custom-select-item-content"><a href="">Select your Block</a></div>
                </li>
                 <li class="past" ng-click="noevent($event);">
                    	<input type="text" name="village" placeholder="Enter village name" ng-model="vquery">
                	</li> 
                <li ng-repeat="village in villages|filter:vquery" class="past">
                      <div class="custom-select-item-content"><a href="{{base_url}}village/{{village.block.district.state.state_name|lowercase|replaceStr}}/{{village.block.district.district_name|lowercase|replaceStr}}/{{village.block.block_name|lowercase|replaceStr}}/{{village.village_name|lowercase|replaceStr}}">{{village.village_name}}</a></div>
                 </li>
                </ul>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- section states start -->
<section class="s-padding states" ng-show="statesval">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 padding-0">
				<h2 class="section-head">Explore <span class="green-text">villages</span> by states</h2>
				<ul class="grid grid-states footer-menu" style="margin:0px;list-style:none;color: #00be8b;">
					<li ng-repeat="state in states">
						<figure class="effect-goliath">
							<img ng-src="{{base_url}}img/state{{$index+1}}.jpg" alt="{{state.state_name}}" width="270" height="205">
							<figcaption>
								<h2>{{state.state_name}}</h2>
								<p><span class="pull-left">Districts - {{DistrictsCount[state.id]?DistrictsCount[state.id]:0}}</span><span class="pull-right">Villages - {{VillagessCount[state.id]}}</span></p>
								<a href="{{base_url}}state/{{state.state_name|lowercase|replaceStr}}">View more</a>
							</figcaption>			
						</figure>
					</li>	
					
				</ul>
                				
			</div>			
		</div>			
	</div>			
</section>

<section class="s-padding about">
	<div class="container">
		<div class="row">
		<div class="col-xs-12 padding-0">
			<h2 class="section-head">About Wikivillage Team</h2>
			<div class="text-center" id="mydiv">
			We are a young team of enthusiasts who believe that our villages play a very significant role in the identity of our nation. Through the wikivillage platform, we aspire to give each and every village in the country a voice of its own. We welcome proud individuals to register and tell interesting stories and details about their villages. We hope to enhance the reach of this website to the farthest and the most remote villages/areas of India. Here, you can add pictures, details, stories and much more.
			</div>
		</div>
	</div>
	</div>
</section>