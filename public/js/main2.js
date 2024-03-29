

$(document).ready(function () {
    $(".Send_data").click(function (e) {
      if ($("input[type=radio][name=item]:checked").length == 0) {
        // alert("Please select atleast one");
        return false;
      } else {
        var item = $("input[type=radio][name=item]:checked").val();
        //  window.alert("You Selected")
  
        window.setTimeout(function () {
          // do whatever you want to do
          $("#loading").html("You Selected : " + item);
         
        }, 600);
  
        $("#loading").html(
          '<br><span class="spinner-border fast"  style="width: 2rem; height: 2rem;color:green;"  role="status"></span>'
        );
      }
    });
  });
  
  function onSubmit(e) {
      e.preventDefault();
   
      
      document.querySelector('.msg').textContent = '';
      document.querySelector('#image').src = '';
      document.querySelector('#image2').src = '';
      document.querySelector('#image3').src = '';

    
      const prompt = document.querySelector('#prompt').value;
      const prompt2 = document.querySelector('#theme').value;
      const clothingpiece = $("input[type=radio][name=item]:checked").val();
      
      const size = document.querySelector('#size').value;
      
    
      if (prompt === '') {
        alert('Please add some text');
        return;
      }
    
      generateImageRequest(prompt,prompt2,clothingpiece, size);
    }
    
    async function generateImageRequest(prompt,prompt2,clothingpiece, size ) {
      try {
        showSpinner();
    
        const response = await fetch('/openai/generateimage', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
          },
          body: JSON.stringify({
            prompt,
            prompt2,
            clothingpiece,
            size,
            
          }),
        });
    
  
        if (!response.ok) {
          removeSpinner();
          throw new Error('That image could not be generated');
        }
    
        const data = await response.json(); 
  
        
        console.log(data);
    
        const imageUrl = data.data;
        const imageUrl2 = data.data2;
        const imageUrl3 = data.data3;
      
    
    
        document.querySelector('#image').src = imageUrl;
        document.querySelector('#image2').src = imageUrl2;
        document.querySelector('#image3').src = imageUrl3;
  
    
        removeSpinner();
      } catch (error) {
        document.querySelector('.msg').textContent = error;
      }
    }
    
    function showSpinner() {
      document.querySelector('.spinner').classList.add('show');
    }
    
    function removeSpinner() {
      document.querySelector('.spinner').classList.remove('show');
    }
    
    document.querySelector('#image-form').addEventListener('submit', onSubmit);