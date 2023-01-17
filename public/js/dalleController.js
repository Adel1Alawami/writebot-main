const { Configuration, OpenAIApi } = require("openai");
const { response } = require("express");
const configuration = new Configuration({
  apiKey: process.env.OPENAI_API_KEY,
});


const openai = new OpenAIApi(configuration);

const generateImage = async ( req ,res) => {

    const {prompt,prompt2, size} = req.body;

    const imageSize = size === 'small' ? '256x256' : size === 'medium' ? '512x512' : '1024x1024';
    const imageTheme = prompt2 === 'cyperpunk' ? 'cyperpunk' : prompt2 === 'artisticportrait' ? 'artistic portrait' : 'medevil';
  

   try {
     const response = await openai.createImage({
        prompt:prompt +" "+  imageTheme  + " " ,
     
        n: 3,
        size: imageSize,
      });
        console.log(req.body)
     const imageUrl = response.data.data[0].url
     const imageUrl2 = response.data.data[1].url
     const imageUrl3 = response.data.data[2].url


     res.status(200).json({
        success: true,
        data: imageUrl,
        data2: imageUrl2,
        data3: imageUrl3,
  
     });


   } catch (error) {
    if (error.response) {
        console.log(error.response.status);
        console.log(error.response.data);
      } else {
        console.log(error.message);
    }

    res.status(400).json({
        success: false,
        error: 'The Image Could Not Be Generated'
     });
   }
};

module.exports = { generateImage };