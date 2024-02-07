const axios = require('axios');
const cheerio = require('cheerio');

const url = 'https://sustainability.google/?utm_source=googlehpfooter&utm_medium=housepromos&utm_campaign=bottom-footer&utm_content=';

// Make a request to the website
axios.get(url)
    .then(response => {
        // Load the HTML content into Cheerio
        const $ = cheerio.load(response.data);

        // // Extract information using CSS selectors
        // const title = $('').text();
        // const paragraphs = $('h1').map((index, element) => $(element).text()).get();

        // // Print the results
        // console.log('Title:', title);
        // console.log('Paragraphs:', paragraphs);

       const text = $('span.search-query-subtext').text();
       console.log(text)
    })
    .catch(error => {
        console.error('Error:', error.message);
    });
