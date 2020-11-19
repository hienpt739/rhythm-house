# DATABASE : rhythmHouseManagement

## TABLE

### Categories

- id
- name (R'n Roll, Classic, Jazz, 60's & 70's)

### Albums

- id
- id_category: FK_Categories
- name
- artist
- performence: (solo, band...)
- releaseYear
- price
- created
- updated

### Puslish_Type

- id
- name (CD, DVD, Tape, Magazine...)

### Albums_Available

- id_Albums: FK_Albums
- id_Puslish_Type: FK_Puslish_Type
- num (available)

### Customers

- id
- id_user
- name
- email
- phone
- address




### Users

- id
- firstName
- lastName
- email
- phone
- password



### Orders

- id
- id_Customers
- created_at
- total money
- status: 0, 1, -1
- expected_time:  
- delivered_time: 


### OrderDetails
- id_Orders
- id_Albums
- id_Puslish_Type
- price
- num
- total money: 


