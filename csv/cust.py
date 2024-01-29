import csv
import random
from faker import Faker

# Initialize Faker to generate fake data
fake = Faker()

# Define the number of employees and the filename
num_employees = 100  # You can change this to the desired number of employees
filename = "customer_details.csv"

# Create a CSV file and write header
with open(filename, mode='w', newline='') as file:
    writer = csv.writer(file)
    
    # Define the header row
    header = ["Cid","Cname", "Cphone","CSpent","joinDate"]
    # Write the header row to the CSV file
    writer.writerow(header)
    
    # Generate and write employee details
    for _ in range(num_employees):
        Cid = random.randint(300, 400)
        Cname = fake.name()
        Cphone = random.randint(8000000000, 9999999999)
        CSpent=random.randint(50000,70000)
        joinDate = fake.date_of_birth(minimum_age=20, maximum_age=50).strftime("%Y-%m-%d")


        
        # Write the employee details to the CSV file
        writer.writerow([Cid,Cname, Cphone, CSpent,joinDate])

print(f"CSV file '{filename}' ")
