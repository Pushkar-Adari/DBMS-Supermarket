import csv
import random
from faker import Faker

# Initialize Faker to generate fake data
fake = Faker()

# Define the number of employees and the filename
num_employees = 30  # You can change this to the desired number of employees
filename = "employee_details.csv"

# Create a CSV file and write header
with open(filename, mode='w', newline='') as file:
    writer = csv.writer(file)
    
    # Define the header row
    header = ["Name", "Phone Number", "Address", "Age", "Salary", "Date of Joining", "Department"]
    depts = ["Cashier", "Cleaner", "Bagger", "Clerk", "Customer Service", "Security"]
    # Write the header row to the CSV file
    writer.writerow(header)
    
    # Generate and write employee details
    for _ in range(num_employees):
        name = fake.name()
        phone_number = fake.phone_number()
        address = fake.address()
        age = random.randint(20, 60)
        salary = round(random.uniform(30000, 100000), 2)
        date_of_joining = fake.date_of_birth(minimum_age=20, maximum_age=50).strftime("%Y-%m-%d")
        department = random.choice(depts)
        
        # Write the employee details to the CSV file
        writer.writerow([name, phone_number, address, age, salary, date_of_joining, department])

print(f"CSV file '{filename}' has been generated with {num_employees} employee details.")
