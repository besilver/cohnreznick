(function($) {
	$.fn.jToningImage = function(o) {
		o = $.extend({
			hue: null,					//Оттенок нового рисунка
			bright: null,				//Яркость нового рисунка или его светлота в зависимости от используемого метода HSV или HSL соответственно
			saturation: null,			//Насыщеность нового рисунка
			color: null,				//Несколько шаблонов(inverse, grey, sepia), если задан этот параметр, он отменяет действия: hue, bright, saturation.
			metod: "HLS"				//Метод которым обрабатывается рисунок (HSL или HSV)
		}, o || {});
		
		return this.each(function() {
			
			var curImage = $(this),
				image= new Image();	
			image.src = curImage.attr("src");
			var wraper,
				myCanvas=document.createElement("canvas"),
				myCanvasContext=myCanvas.getContext("2d"),
				imgWidth=image.width,
				imgHeight=image.height,
				imageLength = 0,
				imageData,
				hueTemp,
				brightTemp,
				saturationTemp,
				newColor = new Array();
			
			//Устанавливаем ширину и длину канвы
			myCanvas.width= imgWidth;
			myCanvas.height=imgHeight;
			
			myCanvasContext.drawImage(image,0,0);
			
			//создаем контейнер для наших рисунков
			curImage.wrap('<span style="position: relative; display: block"></span>');
			wraper = curImage.parent();
				
			//создаем новый рисунок
			image.src = colorStart();
			wraper.append(image);
			
			curImage.next().addClass('toiningImgNew');
			
			
			//Функция срабатывает при старте, меняет цвет картинки в зависимости от переданых параметров, и отдает DataUrl
			function colorStart(){
				imageData = myCanvasContext.getImageData(0,0, imgWidth, imgHeight);
				imageLength = imageData.data.length;
				for (i=0; i<imageLength; i+=4){
					hueTemp = null;
					brightTemp = null;
					saturationTemp = null;
					if (o.color=="grey" || (o.hue==null && o.saturation == null && o.bright==null && o.color==null)){
						newColor = toGreyScale(imageData.data[i], imageData.data[i+1], imageData.data[i+2]);
					}
					else if (o.color=="sepia"){
						o.hue = 30;
						o.saturation = 25;
						o.bright = null;
						newColor = chengTone(imageData.data[i], imageData.data[i+1], imageData.data[i+2]);
					}
					else if (o.color=="inverse"){
						newColor =  [255-imageData.data[i],255-imageData.data[i+1],255-imageData.data[i+2]]; 
					}
					else {
						newColor = chengTone(imageData.data[i], imageData.data[i+1], imageData.data[i+2]);
					}
					imageData.data[i] = newColor[0];
					imageData.data[i+1] = newColor[1];
					imageData.data[i+2] = newColor[2];
				}
				myCanvasContext.putImageData(imageData,0,0,0,0, imageData.width, imageData.height);
				return myCanvas.toDataURL();
			};
			
			//Функция перевода в чернобелый
			function toGreyScale(R, G, B){
				var temp = (R*0.3+G*0.59+B*0.11);
				var arrey = [temp, temp, temp];
				return arrey;
			};
			
			//Функция тонировки рисунка
			function chengTone(R, G, B){
				if (o.metod=="HSV"){
					RGBtoHSV(imageData.data[i] , imageData.data[i+1], imageData.data[i+2]);
					return HSVtoRGB(hueTemp, saturationTemp, brightTemp);
				}
				else {
					RGBtoHSL(imageData.data[i] , imageData.data[i+1], imageData.data[i+2]);
					return HLStoRGB(hueTemp, saturationTemp, brightTemp);
				}
			};
			
			
			//Функция переводит цвета из стандарта RGB в HSL
			function RGBtoHSL(R , G, B){
				var var_R = ( R / 255 ),                    
				var_G = ( G / 255 ),
				var_B = ( B / 255 ),
				L=0,
				H=0,
				S=0;
				
				var var_Min = Math.min( var_R, var_G, var_B ) ,  
				var_Max = Math.max( var_R, var_G, var_B );   
				 
				var del_Max = var_Max-var_Min;   
				
				L = (var_Max+var_Min)/2;
				
				if (del_Max == 0){                    
					H = 0;                                
					S = 0;
				}
				else{                                 
				    if (L < 0.5)
						S = del_Max/(var_Max+var_Min);
   					else
						S = del_Max/(2-var_Max-var_Min);
					del_R = (((var_Max-var_R )/6)+( del_Max/2))/del_Max;
					del_G = (((var_Max-var_G)/6)+(del_Max/2))/del_Max;
					del_B = (((var_Max-var_B)/6)+(del_Max/2))/del_Max;

					if	(var_R==var_Max) 
						H=del_B-del_G;
					else if
						(var_G==var_Max) H=(1/3)+del_R-del_B;
					else if
						(var_B==var_Max) H=(2/3)+del_G-del_R;

					if(H<0)
						H+=1;
					if(H>1) 
						H-=1;
				}
				if (o.bright == null) 
					brightTemp = L;
				else 
					brightTemp = L * o.bright/100;
				if (o.saturation == null) 
					saturationTemp = S;
				else
					saturationTemp = o.saturation/100;
				if (o.hue == null) 
					hueTemp = H;
				else 
					hueTemp = o.hue/360;
			};
			
			//Функция переводит цвета из стандарта HLS в RGB
			function HLStoRGB(H, S, L){
				if ( S == 0 ){
					var R = L * 255,              
			 	   	G = L * 255,
				   	B = L * 255,
					var_2,
					var_1;
				}
				else
				{
    				if ( L < 0.5 )
						var_2 = L * ( 1 + S );
  					else          
					 	var_2 = ( L + S ) - ( S * L );

   						var_1 = 2 * L - var_2;

					R = 255 * Hue_2_RGB( var_1, var_2, H + ( 1 / 3 ) ) 
				   	G = 255 * Hue_2_RGB( var_1, var_2, H )
					B = 255 * Hue_2_RGB( var_1, var_2, H - ( 1 / 3 ) )
				}
				var array = [R, G, B];
				return array;
			};
			function Hue_2_RGB( v1, v2, vH ){
				if ( vH < 0 ) vH += 1;
				if ( vH > 1 ) vH -= 1;
				if ( ( 6 * vH ) < 1 ) return ( v1 + ( v2 - v1 ) * 6 * vH );
				if ( ( 2 * vH ) < 1 ) return ( v2 );
				if ( ( 3 * vH ) < 2 ) return ( v1 + ( v2 - v1 ) * ( ( 2 / 3 ) - vH ) * 6 );
				return ( v1 );
			};
			
			//Функция переводит цвета из стандарта RGB в HSV
			function RGBtoHSV(R, G, B){
				//RGB from 0 to 255
				var var_R = ( R / 255 ),                    
				var_G = ( G / 255 ),
				var_B = ( B / 255 ),
				V=0,
				H=0,
				S=0;
				
				var var_Min = Math.min( var_R, var_G, var_B ) ,  
				var_Max = Math.max( var_R, var_G, var_B );   
				 
				var del_Max = var_Max-var_Min;   
				
				V = var_Max;
				
				if (del_Max == 0){                    
					H = 0;                                
					S = 0;
				}
				else{                                 
				    S = del_Max/var_Max;
					
					del_R = (((var_Max-var_R )/6)+( del_Max/2))/del_Max;
					del_G = (((var_Max-var_G)/6)+(del_Max/2))/del_Max;
					del_B = (((var_Max-var_B)/6)+(del_Max/2))/del_Max;

					if	(var_R==var_Max) 
						H=del_B-del_G;
					else if
						(var_G==var_Max) H=(1/3)+del_R-del_B;
					else if
						(var_B==var_Max) H=(2/3)+del_G-del_R;

					if(H<0)
						H+=1;
					if(H>1) 
						H-=1;
				}
				if (o.bright == null) 
					brightTemp = V;
				else 
					brightTemp = V * o.bright/100;
				if (o.saturation == null) 
					saturationTemp = S;
				else
					saturationTemp = o.saturation/100;
				if (o.hue == null) 
					hueTemp = H;
				else 
					hueTemp = o.hue/360;
			};
			
			//Функция переводит цвета из стандарта HSV в RGB
			function HSVtoRGB(H, S, V){
				var var_r = 0,
				var_g = 0,
				var_b = 0;
				
				if(S == 0){
					R = V*255;
					G = V*255;
					B = V*255;
				}
				else
				{
					var var_h = H*6;
					if (var_h == 6) 
						var_h=0;
						
					var var_i = parseInt(var_h);
					var var_1 = V*(1-S),
					var_2 = V*(1-S*(var_h-var_i)),
					var_3 = V*(1-S*(1-(var_h-var_i)));
					
					if(var_i==0){
						var_r = V,
						var_g = var_3,
						var_b = var_1;
					}
					else if(var_i == 1){
						var_r = var_2;
						var_g = V;
						var_b = var_1;
					}
					else if(var_i == 2){
						var_r = var_1;
						var_g = V;
						var_b = var_3;
					}
					else if(var_i==3){
						var_r = var_1;
						var_g = var_2;
						var_b = V;
					}
					else if(var_i== 4 ){
						var_r = var_3;
						var_g = var_1;
						var_b = V;
					}
					else{ 
						var_r = V;
						var_g = var_1;
						var_b = var_2;
					}
					
					R = var_r * 255;                
					G = var_g * 255;
					B = var_b * 255;	
				}
				var array = [R, G, B];
				return array;
			};
		});
	};
})(jQuery);