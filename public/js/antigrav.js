
/*


PUBLIC
.activate 						activate antigrav  
.deactivate 					deactivate antgrav  (does not turn any sub functions, such as autopan)
.disableSelect					disable text selection
.enableSelect					enable text selection
.xMultiplier					scale x pan speed 
.yMultiplier					scale y pan speed

.autoPan (element)				pan to element's x,y
	"	 (int,int)				pan to given x/y

.drag(event,[target])			makes element draggable.  if target, then target drags instead.
//.resize(event,[target])		no such function
//.close(event[target])			no such function
//.fade	(target)				no such function

.findPos(element) = [int,int]	returns an element's absolute location (in px)
.mouseX(event) = int			returns mouse's X at event
.mouseY(event) = int			returns mouse's Y at event
.scrollX = int					returns the current scroll X of the window
.scrollY = int					returns the current scroll Y of the window
.windowWidth = int				returns the width of the window					
.windowHeight = int				returns the height of the window	
.docWidth = int
.docHeight = int				

.panAction 						function to be activated at every pan interval 	(null default) 	
//.endPanAction					function to be activated on pan start 			(null default) 	
//.startPanAction				function to be activated on pan end 			(null default) 	
		
.granularity 					size of quads to be tracked by getNewQuads		
.getNewQuads = array			returns a poorly structured array of quads that are visible to the user, and have not been seen by the user.

PRIVATE (but not really)
.noPxEm	(string) = string		removes last 2 chgaracters of a srtring, returns it.
.startPan
.doPan
.endPan
.ease(b,c,t,d)					penner's magic easing function
.doDrag (event)
.endDrag
.doAutoPan
.endAutoPan

*/



var antigrav={
	xMultiplier:2,
	yMultiplier:2,
    mouseXOld:0,
	mouseYOld:0,
	panXount:0,
	panAction:function(){},

    activate:function(){
        document.body.onmousedown = antigrav.startPan;
        antigrav.disableSelect();
        if (!document.getElementById('scrollsheild')){        // create scroll shield
   		 	var shield = document.createElement("div");
			shield.setAttribute('id', 'flashshield');
			shield.style.position='fixed';
			shield.style.height='100%'; 
			shield.style.width='100%'; 
			shield.style.zIndex='10000';
			shield.style.top='0px'; 
			shield.style.left='0px';  
			shield.style.display='none'; 
			document.body.appendChild(shield);
        }
    },
    
    deactivate:function(){
        document.body.onmousedown = null;
        document.body.onmousemove = null;
        document.body.onmouseup = null;
	},
	
    startPan:function(event){
    	document.body.onmouseup = antigrav.endPan;
		document.body.onmousemove = antigrav.doPan;
		antigrav.mouseXOld=antigrav.mouseX(event);
		antigrav.mouseYOld=antigrav.mouseY(event);
		this.panCount=0;
    },
    
    doPan:function(event){
    	xscroll=(antigrav.mouseXOld-antigrav.mouseX(event))*antigrav.xMultiplier;
    	yscroll=(antigrav.mouseYOld-antigrav.mouseY(event))*antigrav.yMultiplier;
		antigrav.mouseXOld=antigrav.mouseX(event);
		antigrav.mouseYOld=antigrav.mouseY(event);
		window.scrollBy(xscroll,yscroll);
		this.panCount++;
		if (this.panCount>4){
			document.getElementById('flashshield').style.display='block';	
		}
		antigrav.panAction();
	},
	
	endPan:function(event){	
		document.body.onmouseup = null;
		document.body.onmousemove = null;
		document.getElementById('flashshield').style.display='none';
	},

	autoPan:function(theelement,y){

		if (typeof theelement == 'object'){
			x=antigrav.findPos(theelement)[0]-antigrav.windowWidth()/2+200;
			y=antigrav.findPos(theelement)[1]-70;
		}else{var x=theelement}


		if (x<=1){x=1}
		if (y<=1){y=1}
		this.pStartX=antigrav.scrollX();
		this.pStartY=antigrav.scrollY();
		this.pDistX=x-antigrav.scrollX();
		this.pDistY=y-antigrav.scrollY();
		this.pFrame=1;
		this.pFrames=15;
		this.autoPanning=true;
		theid = theelement.id;		
		window.location.hash = theid+"loc";
		this.doAutoPan();		
	},
	
	
	doAutoPan:function(){
		if (this.pFrame<this.pFrames){
			setTimeout("antigrav.doAutoPan()",40);
			this.pFrame++;
			var panSpeedX=  antigrav.ease(this.pStartX,this.pDistX,this.pFrame,this.pFrames);
			var panSpeedY=  antigrav.ease(this.pStartY,this.pDistY,this.pFrame,this.pFrames);
			scrollTo(panSpeedX,panSpeedY);
		}else{
			this.autoPanning=false;
		}
	},
	
	autoPanZoom:function(theelement,zoom,zoomEl){
	
		if (typeof theelement == 'object'){
			x=antigrav.findPos(theelement)[0]-antigrav.windowWidth()/2+200;
			y=antigrav.findPos(theelement)[1]-70;
		}else{var x=theelement}

		if (this.zoomLevel){
			this.oldZoom=this.zoomLevel
		}else{
			this.oldZoom=1;
		}
		this.zoomLevel=zoom;
		this.zoomEl=$(zoomEl)

		if (x<=1){x=1}
		if (y<=1){y=1}
		this.pStartX=antigrav.scrollX();
		this.pStartY=antigrav.scrollY();
		this.pDistX=x-antigrav.scrollX();
		this.pDistY=y-antigrav.scrollY();
		this.pFrame=1;
		this.pFrames=15;
		theid = theelement.id;		
		window.location.hash = theid+"loc";
		this.doAutoPanZoom();		
	},
	
	
	doAutoPanZoom:function(){
		if (this.pFrame<this.pFrames){
			zoomLevel=this.pFrames*this.pFrame
			//debug(zoomLevel+' ' +this.pFrame+' '+this.pFrames)
		//	this.zoomEl[0].style.WebkitTransform='scale('+zoomLevel+','+zoomLevel+')';
			
			setTimeout("antigrav.doAutoPanZoom()",40);
			this.pFrame++;
			var panSpeedX=  antigrav.ease(this.pStartX,this.pDistX,this.pFrame,this.pFrames);
			var panSpeedY=  antigrav.ease(this.pStartY,this.pDistY,this.pFrame,this.pFrames);
			scrollTo(panSpeedX,panSpeedY);
		}
	},
		
	
	
	drag:function (event, thedragged){
		antigrav.deactivate();
		document.body.onmousemove=antigrav.doDrag;
	   	document.body.onmouseup=antigrav.endDrag;
	   	if (!thedragged){
			if (!event) var event = window.event;
			if (event.target) targ = event.target;
			else if (event.srcElement) targ = event.srcElement;
			//	if (targ.nodeType == 3) // defeat Safari bug	
		}else{
			targ=document.getElementById(thedragged);
		}			
		antigrav.mouseXOld=antigrav.mouseX(event);	
		antigrav.mouseYOld=antigrav.mouseY(event);
	},
	
	doDrag:function (event) {						//update a move
		var mousex=antigrav.mouseX(event);
		var mousey=antigrav.mouseY(event);
		var xdif=mousex-antigrav.mouseXOld;
		var ydif=mousey-antigrav.mouseYOld;
		var currentx=targ.style.left;
		var currenty=targ.style.top;
		var newx=antigrav.noPxEm(currentx)+xdif;
		var newy=antigrav.noPxEm(currenty)+ydif;
		targ.style.left=newx+'px';
		targ.style.top=newy+'px';
		antigrav.mouseXOld=mousex;
		antigrav.mouseYOld=mousey;
	},

	endDrag:function () {							// end a move
		antigrav.activate();
		document.body.onmousemove=null;
   		document.body.onmouseup=null;
	},
	
	
	ease:function(b,c,t,d){   					   // robert penner's magic formula
		if (t < d/2) {return 2*c*t*t/(d*d) + b;}
		var ts = t - d/2;
		return -2*c*ts*ts/(d*d) + 2*c*ts/d + c/2 + b;
	},
	
	mouseX:function(event){
		if (document.all)	{return window.event.screenX;}
		else				{return event.screenX;}
	},

	mouseY:function(event){
		if (document.all)	{return window.event.screenY;}
		else				{return event.screenY;}
	},	

	scrollX:function() {
  		return  (document.all)?document.body.scrollLeft:window.pageXOffset;
	} ,

	scrollY:function() {
  		return  (document.all)?document.body.scrollTop:window.pageYOffset;
	} ,
	
	windowHeight:function(){
		return document.body.clientHeight;
		//return document.height ? document.height : document.documentElement.offsetHeight;		
	},

	windowWidth:function(){
		return document.body.clientWidth;
		//return document.width ? document.width : document.documentElement.offsetWidth;
	},
	
	docHeight:function() {
		return document.body.scrollHeight;
	},
	
	docWidth:function() {
		return document.body.scrollWidth;	
	},
	

	findPos:function(obj) {     				
		var curleft = curtop = 0;
		if (obj.offsetParent) {
			curleft = obj.offsetLeft
			curtop = obj.offsetTop
			while (obj = obj.offsetParent) {
				curleft += obj.offsetLeft
				curtop += obj.offsetTop
			}
		}
		return [curleft,curtop];
	},
	
	disableSelect:function(){	
		document.onmousedown=function(){return false};
//		document.onclick=function(){return false};
		window.document.ondrag=function(){return false};
		window.document.onselectstart=function(){return false};
	},
	
	enableSelect:function(){	
		document.onmousedown=function(){return true};
		document.onclick=function(){return true};
		window.document.ondrag=function(){return true};
		window.document.onselectstart=function(){return true};
	},
	

	noPxEm:function (themeasure){  //takes the stupid px or em off of the end of the css widths and heights
		strlength=themeasure.length-2;
		themeasure=themeasure.slice(0,strlength);
		themeasure=parseInt(themeasure,10);
		return themeasure;
	},
	
	granularity:300,
	thisQuad:null,
	
	getNewQuads:function(){
		if (typeof (visited) == 'undefined'){visited = []}
		var justVisited = []
		//how big is the window?
		var winWidth=Math.round(antigrav.windowWidth()/antigrav.granularity);
		var winHeight=Math.round(antigrav.windowHeight()/antigrav.granularity);
		//where are we?  	
		var myX=Math.round(antigrav.scrollX()/antigrav.granularity) ;
		var myY=Math.round(antigrav.scrollY()/antigrav.granularity) ;
	
		oldQuad=antigrav.thisQuad;
		antigrav.thisQuad=myX*1000+myY;
		if (antigrav.thisQuad!=oldQuad){
			for (i=myX-1;  i < myX+winWidth+1; i++){
				for (j=myY-1;  j < myY+winHeight+1; j++){
					if (visited[i*1000+j] !=true){
						visited[i*1000+j] =true;
						justVisited[i*1000+j]=true;
					}
				}				
			}   
	
		}
		return justVisited;
	}	
}

//antigrav.activate();

if (window.onload != typeof 'function') {
//	window.onload=antigrav.activate;
}else{
	oldOnLoad=window.onload;
//	window.onload=function (){antigrav.activate();  oldOnLoad();}
}


