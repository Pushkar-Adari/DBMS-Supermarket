import csv
import random
from faker import Faker

# Initialize Faker to generate fake data
fake = Faker()

# Define the number of employees and the filename
num_products = 50  # You can change this to the desired number of employees
filename = "Product_details.csv"

# Create a CSV file and write header
with open(filename, mode='w', newline='') as file:
    writer = csv.writer(file)
    
    # Define the header row
    header = ["Pid","Pcprice","Psupp","Pmprice","Pquant"]
    sid=[201,202,203,204,205,206,207]
    # Write the header row to the CSV file
    writer.writerow(header)
    
    # Generate and write employee details
    for _ in range(num_products):
        Pid = random.randint(1000, 2000)
        Pcprice=random.randint(100,500)
        Psupp=random.choice(sid)
        Pmprice=random.randint(500,1000)
        Pquant=random.randint(40,100)
        

        
        # Write the employee details to the CSV file
        writer.writerow([Pid,Pcprice, Psupp, Pmprice,Pquant])

print(f"CSV file '{filename}'.")
