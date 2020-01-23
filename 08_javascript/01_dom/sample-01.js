/*
* Types of Nodes:
* Document [9]
* DocumentType [10]
* Element [1]
* Text [3]
* Comments [8]
* DocumentFragments [11]
* */

/*
*
* Select Dom Nodes with JS:
* document : to get all of document nodes
*
* helpful document properties:
* ============================
* url
* location: object with pathname property that shows the path of running file
* doctype
* charset
* title
* styleSheets
* scripts
* head
* body
* links : array of links in a document
* images
* forms
* children
* childNodes
*
* Helpful document Methods
* ========================
* document.getElementById()
* document.getElementsByTagName()
* document.getElementsByClassName()
*
* Note: notice to name of element & elements for these methods
*
* document.querySelector()
* document.querySelectorAll()
*
* */
let html = document.children[0]; //getting first element in document which is html tag
let contact = document.getElementById('contact'); //return element by contact id
let divs = document.getElementsByTagName('div'); //return an array


