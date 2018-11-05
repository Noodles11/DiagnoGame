function observe(){
	window.addEventListener('resize',resizeWindow,false);
}

function resizeWindow(){

	// var size = (window.innerWidth > window.innerHeight ? window.innerWidth : window.innerHeight);
	// console.log(size);
	// document.body.background = size;
}

System = {
	init: function(){

		// this.setBg('bg1.jpg');
		//this.prepareBadges();
	},
	prepareBadges: function(){

		this.cont = document.createElement('div');
		this.cont.id = 'badges';
		document.body.appendChild( this.cont );

		this.cont.style.display='none';
	},
	showBadges: function(){

		this.cont.style.display='block';
		//$('#badges').anim({opacity:0},200);
	},
	hideBadges: function(){

		this.cont.style.display='none';
	},
	addBadge: function( badge ){

		this.cont.innerHTML += badge;

		this.animBadges( 1000 );
	},
	animBadges: function( time ){

		this.showBadges();

		setTimeout(function(){

			this.hideBadges();

		}.bind(this),time);
	},

	playSound: function( id ){
		$('#'+id)[0].play();
	},

	setBg: function( src ){

		$('#bg').css('background','url('+src+') no-repeat center top');
		$('#bg').css('backgroundSize',window.innerWidth);
	},

	rmCBA: function(){

		if( $('#reklamacba') ){ 
			$('#reklamacba').remove(); 
		}

		if( $('div.cbalink') ){
			$('div.cbalink').remove();
		}
	},
}

$( document ).ready( function(){
	observe();
	System.init();
	resizeWindow();
	CbaRm = setTimeout(System.rmCBA,100);
});