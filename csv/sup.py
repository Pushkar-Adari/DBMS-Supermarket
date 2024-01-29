import csv
import random
from faker import Faker

# Initialize Faker to generate fake data
fake = Faker()

# Define the number of employees and the filename
num_employees = 7  # You can change this to the desired number of employees
filename = "Supplier_details.csv"

# Create a CSV file and write header
with open(filename, mode='w', newline='') as file:
    writer = csv.writer(file)
    
    # Define the header row
    header = ["Sid","Sname", "Sphone", "Saddress","Semail"]
    # Write the header row to the CSV file
    writer.writerow(header)
    
    # Generate and write employee details
    for _ in range(num_employees):
        Sid = random.randint(100, 199)
        Sname = fake.name()
        Sphone = fake.phone_number()
        Saddress = fake.address()
        Semail = fake.email()

        
        # Write the employee details to the CSV file
        writer.writerow([Sid,Sname, Sphone, Saddress,Semail])

print(f"CSV file '{filename}' has been generated with {num_employees} Sup details.")
