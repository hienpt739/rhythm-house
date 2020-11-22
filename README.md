# REQUIREMENT SPECIFICATIONS

- A menu that will categorize all the functions of the site. => navbar

- Display the list of available albums category wise. => page: albums

- Albums can be of movies or different bands or solo performer’s collections.

- Categories can be CD, DVD, Tape as well as movies, bands, Solo performers. E.g there can be CD of a movie as well as DVD and tape, all should be displayed separately.

  => albums : dropdown categories

- Perform the search based on a particular

  1. movie
  2. band
  3. solo performer
  4. release year

  => navbar: searching area; albums: searching area

- Display the statistics of albums sold monthly. => page: home

- Display the various offers/contests by the shop => page: home or page: special offers

- Display the details (performer, time, duration, entry fee etc) of live shows. => page: live shows

- Give information about membership. => pages: sign up, sign in, view + edit info

- Display the available books and magazines.

- Display the price list of the various items available in the shop i.e. (CDs, DVDs, Tapes, Books, Magazines). => albums: checkbox

- Display the schedule and details of upcoming live shows. => page: live shows

- Site should be able to provide brief introduction/history about the shop under AboutUs page. => page: About Us

- The location of the shop under Contact-Us page. page: Contact Us

- Besides the above requirements, the site should have look and feel as per the industry standards

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
- description
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
- name
- email
- phone
- address

### Users

- id
- id_Customers
- name
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
- note

### OrderDetails

- id_Orders
- id_Albums
- id_Puslish_Type
- price
- num
- total money:


#DATABASE 2 


###Categories:
	- id
	- name (album, book, magazine...)
### Prouducts:
	- id
	- id_Categories
	- name
	- price
	- thumnail_link
	- description
	- created_at
	- updated_at
	- artist
	- performance
	- release_year

### Albums_Puslish_Type:
	- id
	- name (CD, DVD, Tape, Movie...)

### Albums_Available: 
	- id_Products
	- id_Albums_Puslish_Type
	- number


### Categories: 
	- c1 -- book
	- c2 -- album

### Prouducts:
	- p1 -- c1 -- Jazz Albums -- John Doe -- solo 
	- p2 -- c1 -- Classic Albums -- John Doe New -- movie

### Albums_Puslish_Type:
	- a1 -- CD
	- a2 -- DVD
	- a3 -- Tape

### Albums_Available: 
	- p1 -- a1 -- 3
	- p1 -- a2 -- 2

### Customers:
	- id
	- name
	- phone
	- address

### Users: 
	- id
	- id_Customers
	- name
	- email
	- password
	
### Orders:
	- id
	- id_Customers
	- created_at
	- total money ?
	- status: 0, 1, -1
	- note

### OrderDetails:
	- id_Orders
	- id_Albums
	- id_Puslish_Type
	- price
	- num
	- total money ?




# PAGES

### Home

- navbar: icon, nav link, search, user(sign up, in out)
- body: some usful informations + link to another page...
- footer: copy right, register mark, (link), phone, address, email...

### Albums

- navbar
- body:
  1. display list albums: img, name, artist, btn(view details, buy, add to card,...) => page: <b>View Detail</b>
