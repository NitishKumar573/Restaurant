const apiUrl = 'https://www.themealdb.com/api/json/v1/1/filter.php?a=Indian';

const getFood=async()=>{
    const container = document.getElementById('food-container');
    
    const response = await fetch(apiUrl);
    let data=await response.json();
    console.log(data);
    const meals = data.meals.slice(0,50);
    /*const container=document.createElement("div");
    container.className="box-container";*/
    meals.forEach(meal => {
        
        const foodCard=document.createElement("div");
        foodCard.className="food-Card";
        const img=document.createElement("img");
        img.src=meal.strMealThumb;
        foodCard.appendChild(img);
        container.appendChild(foodCard);
        const text=document.createElement("h2");
        text.className="text";

        text.textContent=meal.strMeal;
        foodCard.appendChild(text);
        const description = document.createElement('p');
        description.textContent = `Try this amazing dish, ${meal.strMeal}.`; // Placeholder description
        foodCard.appendChild(description);
        description.className="description";

        container.appendChild(foodCard);




        
    })
    
    

    
}
getFood();