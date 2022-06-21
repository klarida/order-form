# Title: Order form

- Repository: `php-order-form`
- Type of Challenge: `Learning challenge`
- Duration: `3 days`
- Deployment strategy : NA
- Team challenge : `solo`
#  Must-have features
---
## Preparation
- Have a look at the provided structure: you get both an index file and another file containing a form. How are these two working together?
- Think of a funny / surprising / original name for a store that should definitely exist. (fancy suits for cats? bongo for dates? you name it!)
- Think of some products to sell (feel free to be creative) and update the products array with these.
- Check if all the products & prices are currently visible in the form.

### Step 1: accepting orders
- Show an order confirmation when the user submits the form. This should contain the chosen products and delivery address.
- We will learn how to save this information to a database later, so no need to do this now.

### Step 2: Validation
- Use PHP to check the following:
- Required fields are not empty. 

- Zip code are only numbers.
- Email address is valid.
- Show any problems (empty or invalid data) with the fields at the top of the form. 
- If the form was not valid, show the previous values in the form so that the user doesn't have to retype everything.
### Step 3: improve UX by saving user data
- Check out the possibilities of the PHP session and cookies.
- We want to prefill the address (you can just use any previous user input, we don't need to get data from anywhere else), as long as the browser isn't closed. 
  - Which of these techniques is the better choice here?

