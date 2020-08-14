# String Calculator Kata
This is an incremental kata. Implement the features in the order that they're described. Do not jump to step 3 befor completing step 2 before.

### Step 1
Create a simple String calculator with a method `add()` that gets a string as an argument and returns an integer.
The method can take up to two numbers, separated by commas, and will return their sum.
- An empty string `""` will return 0.
- If one number is given, the `add()` method will return the same number as integer: (input: `"1"` -> output: `1`)
- If 2 numbers are given, the function will sum them and return the value as integer: (input: `"1,2"` -> output `3`)

### Step 2
Allow the `add()` method to handle an unknown amount of numbers.

### Step 3
Ignore numbers greater than 1000: (input: `"2, 1003"` -> outpu: `2`)

### Step 4
Support different delimetters (others than a comma), such as `:`,`/`,`%`,`-`,`.`,`|`,`$`

### Step 5
Calling Add with a negative number will throw an exception “negatives not allowed” - and the negative that was passed.

If there are multiple negatives, show all of them in the exception message.




