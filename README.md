## CSC423 PROJECT PROBLEM DESCRIPTION
*Overseen by Sandeep Mitra and an unofficial representative from the company Dunnhumby* 

###### HTML/CSS/JAVASCRIPT/PHP Based Web Application for the Imaginary Company "Nanno's Foods"
> Nanno's Foods is a company that owns multiple stores in a certain area. It has suppliers that supply these stores with their goods. In order to keep track of their operations, Nannos's foods requires a web application that keeps track of item stocks in each store, current vendors, item orders from the vendors, current customers, deliveries from the vendors, and returns to the vendors (vendors are required to dispose of not sold items).

## PROJECT FEATURES
1. CRUD operations on Vendors
    >Vendors can be created, read, updated, or deleted.

2. CRUD operations on Stores
    >Stores can be created, read, updated, or deleted.

3. CRUD operations on Items 
    >Items can be created, read, updated, or deleted.

4. CRUD operations on Customers
    >Customers can be created, read, updated, or deleted.

5. CRU operations on Orders
    >Orders can be created, read, or updated. They cannot be deleted. 

6. Process a return
    >Return items to the Vendor. Decrement item stocks by the respective quanties.

7. Process a delivery
    >Mark a deliver as "Fufilled" once it makes it to the specified store. Increment item stocks by the respective quantities.

8. Create a purchase
    >A purchase is made to a customer from a store. the quantity in-stock of the item is deducted respectively.

9. View orders from vendors
    >Requires the vendor to log in, they they are shown the current orders.

10. Reports to be saved to CSV
    - List all items report
      - Retrives all the Donors from the 'Inventory' records with the number of items they have donated
    - List all overdue items report
      - Retrives all 'Inventory' records that are available to give out (Status is "donated")
    - Report items delievered in a certain time period
      - Retirves all 'Inventory' records that have been given out up to a certain date
    - List top 10 items returned in a time period report
      - Retirves all 'Inventory' records that have been given out up to a certain date
      
 ## GUI Screenshots
![Screenshot](Screenshots/Homepage.PNG)

![Screenshot](Screenshots/VendorPortal.PNG)

![Screenshot](Screenshots/AddVendor.PNG)

![Screenshot](Screenshots/ModifyVendor.PNG)

![Screenshot](Screenshots/DeleteVendor.PNG)

![Screenshot](Screenshots/StorePortal.PNG)

![Screenshot](Screenshots/CustomerPortal.PNG)

![Screenshot](Screenshots/ItemPortal.PNG)

![Screenshot](Screenshots/OrderPortal.PNG)

![Screenshot](Screenshots/CreateOrder.PNG)

![Screenshot](Screenshots/ProcessDelivery.PNG)

![Screenshot](Screenshots/Purchase.PNG)

![Screenshot](Screenshots/Returns.PNG)

![Screenshot](Screenshots/Reports.PNG)
