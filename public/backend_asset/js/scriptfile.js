 $(document).ready(function()
 {
 	$("#photo").on('change',function() {
 		var fileList = this.files; 
 	//console.log(fileList);
	 for(var i = 0; i < fileList.length; i++)
	 {
	      //get a blob 
	      var t = window.URL || window.webkitURL;
	      var objectUrl = t.createObjectURL(fileList[i]);
	      $("#changeimg").attr("src",objectUrl);
	  }
	});

	$("#icon").on('change',function() {
 		var fileList = this.files; 
 	//console.log(fileList);
	 for(var i = 0; i < fileList.length; i++)
	 {
	      //get a blob 
	      var t = window.URL || window.webkitURL;
	      var objectUrl = t.createObjectURL(fileList[i]);
	      $("#changeicon").attr("src",objectUrl);
	  }
	});

	
	// $("#photo1").on('change',function() {
 // 		var fileList = this.files; 
 // 	//console.log(fileList);
	//  for(var i = 0; i < fileList.length; i++)
	//  {
	//       //get a blob 
	//       var t = window.URL || window.webkitURL;
	//       var objectUrl = t.createObjectURL(fileList[i]);
	//       $(".testimg1").attr("src",objectUrl);
	//   }
	// });
	// $("#photo2").on('change',function() {
 // 		var fileList = this.files; 
 // 	//console.log(fileList);
	//  for(var i = 0; i < fileList.length; i++)
	//  {
	//       //get a blob 
	//       var t = window.URL || window.webkitURL;
	//       var objectUrl = t.createObjectURL(fileList[i]);
	//       $(".testimg2").attr("src",objectUrl);
	//   }
	// });
	// $("#photo3").on('change',function() {
 // 		var fileList = this.files; 
 // 	//console.log(fileList);
	//  for(var i = 0; i < fileList.length; i++)
	//  {
	//       //get a blob 
	//       var t = window.URL || window.webkitURL;
	//       var objectUrl = t.createObjectURL(fileList[i]);
	//       $(".testimg3").attr("src",objectUrl);
	//   }
	// });

 // 	var j=0;
 // 	$("#photo").on('change',function() {

 // 		var fileList = this.files; 
	//  //console.log(fileList);
	//  for(var i = 0; i < fileList.length; i++)
	//  {
	//       //get a blob 
	//       var t = window.URL || window.webkitURL;
	//       var objectUrl = t.createObjectURL(fileList[i]);
	//       //$('#images').append('<img src="' + objectUrl + '" class="img-fluid w-25 h-25 mx-3 uploadphoto" />');
	//       $('#images').append(`<div class="col-md-4">
 //                <a href="#" class="btn px-4 delete" title="Delete" data-id=${j}>
 //                <i class="fas fa-trash-alt text-danger"></i></a>
 //                <a href="#"><img src="${objectUrl}" class="img-fluid mx-3" id="img${j} name="img${j}"></a>
 //              </div>`);
 // 		j++;

 // 		//console.log($('#photo').text());
	//   }
	// });
	// $("#images").on("click",".delete",function()
	// {
	// 	var id="#img"+$(this).data("id");
	// 	$(this).hide();
	// 	$(id).hide();
	// })
	
 })




 
 
