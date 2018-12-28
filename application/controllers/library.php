<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class library extends CI_Controller{
// load models
  public function __construct() {
    parent::__construct();

    $this->load->model('login_model');
    $this->load->model('book_add_model');
    $this->load->model('show_all_books_model');
    $this->load->model('edit_model');
    $this->load->model('author_model');
    $this->load->model('search');
    $this->load->model('category');



    $this->load->helper('url');
  }
// veiw admin page
  function index(){

$this->load->view('login');
}
// security login for admin
public function loginrequest()
   {
     $result = $this->login_model->login($this->input->post("UserName"),$this->input->post("Password"));
     if($result!=0)
     {
       $this->session->set_userdata('isuserloggedin', 'true');

       redirect('library/dashboard');
     }
     else
     {
       echo "wrong username or password";
     }
   }
   function dashboard(){

     $this->load->view('dashboard');
   }
   // this function make
public function logout(){
  $this->session->unset_userdata('isuserloggedin');
  redirect('/library');
}

//this function is called when you go to this url:http://localhost/library1//index.php/library/add_book
//to load this view we need to get genre,author and format from the Database
//we use the book_add_model.getgenre(), & book_add_model.getgenre(), book_add_model.getauthor()to get the lists
   public function add_book()
          {
          	$result = $this->book_add_model->getauthors();
          	$data = array();
          	$data['authorslist'] = $result;
          	$result = $this->book_add_model->getcategory();
          	$data['categorylist'] = $result;
          	$result = $this->book_add_model->getformat();
          	$data['formatlist'] = $result;

          	$this->load->view('addbookview',$data);
          }
// add_book_result is the action from in the form http://localhost/library1//index.php/library/add_book
//we call book_add_model.addbook() to insert the new student to the database
          public function add_book_result()
          	{
          		if($this->input->post("ID") ||$this->input->post("ISBN") ||$this->input->post("BookName")
              || $this->input->post("BookPrice") || $this->input->post("DatePublish") || $this->input->post("number_of_pages")
              || $this->input->post("BestOfCollection") || $this->input->post("PrintDate")
              ||$this->input->post("EditionNumber")||$this->input->post("author_IdAuthor")
          		|| $this->input->post("category_IdCategory")|| $this->input->post("format_idformat"))
          		{
          			$result = $this->book_add_model->addnewbook();
          			$data = array();
          			$data['result'] = $result;
         			$this->load->view('addbookresults',$data);
          		}

          	}

            public function search_books()
      	{
      		if($this->input->post("BookName"))
      		{
      			$result = $this->search->searchbooks($this->input->post("BookName"));
      			$data = array();

      	    $data['books'] = $result;
      			$this->load->view('search_books',$data);
      		}
      		else
      		{
      			$this->load->view('search_books');
      		}
      	}
        //show all books is called when we you go to url http://localhost/library1//index.php/library/show_books
        // it calls the show_all_books_model to view all the books
            public function show_books()
            	{

            			$result = $this->show_all_books_model->showbooks();
            			$data = array();
            			$data['book'] = $result;


            	$result = $this->show_all_books_model->bookauthor();
            	$data['bookauthors'] = array_pop($result);
            			$result = $this->show_all_books_model->bookcategory();
            			$data['bookcategory'] = array_pop($result);

            			$result = $this->show_all_books_model->booksformat();
            			$data['bookformats'] = array_pop($result);
            			$this->load->view('all_books',$data);


}


// edit book is called when you click on the button in the edit button in showallbooks
//in the link editbook/1 .. edit book  is the function & 1 is the id of the book we'll be editing.
//now after that we fill in the requried felids we press edit
  public function editbook($id)
    {
        $result = $this->book_add_model->getauthors();
        $data = array();
        $data['authorslist'] = $result;
        $result = $this->book_add_model->getcategory();
        $data['categorylist'] = $result;
        $result = $this->book_add_model->getformat();
        $data['formatlist'] = $result;
        $result = $this->edit_model->getbooksandedition($id);
        $data['books'] = array_pop($result);
        $result = $this->edit_model->getbooksauthor($id);
        $data['books_has_author'] = $result;
        $result = $this->edit_model->getbookformat($id);
        $data['format_has_books'] = $result;
        $result = $this->edit_model->getbookscategory($id);
        $data['category_has_books'] = $result;
        $this->load->view('edit',$data);
    }
    //the action from the form http://localhost/library1/index.php/library/editbook/48
    //updatebook will take the data from the form and updates the book based on their ID
    public function updatebook()
    {
        if($this->input->post("ID") ||$this->input->post("ISBN") ||$this->input->post("BookName")
    || $this->input->post("BookPrice") || $this->input->post("DatePublish") || $this->input->post("number_of_pages")
    || $this->input->post("BestOfCollection") || $this->input->post("PrintDate")
    ||$this->input->post("EditionNumber")||$this->input->post("author_IdAuthor")
    || $this->input->post("category_IdCategory")|| $this->input->post("format_idformat"))
        {
            $result = $this->edit_model->updateitem();
            $data = array();
            $data['result'] = $result;
            $this->load->view('editresults',$data);
        }
    }

// we call the edit model to delete the book using the deletebook function
    public function delete_book($id)
    {
        $result = $this->edit_model->deletebook($id);

    redirect('/library/show_books');

    }

// here we are displaying all authors
  public function allauthors()
  	{
  		$all_authors = $this->author_model->all_authors();

      $data = array();
      $data['author'] = $all_authors;
  		$this->load->view('authors',$data);
  	}



//in this function we are calling the author_model to add a new author
    public function add_authors()
{
    if($this->input->post("IdAuthor") || $this->input->post("AuthorName"))
    {
        $result = $this->author_model->addauthor();
        $data = array();
        $data['result'] = $result;
        $this->load->view('add_authors',$data);
    }
    else
        {
            $this->load->view('add_authors');
        }

}
// we are calling category model to add a new genre
public function add_genere()
{
if($this->input->post("IdCategory") || $this->input->post("CategoryName"))
{
  $result = $this->category->add_genere();
  $data = array();
  $data['result'] = $result;
  $this->load->view('add_genere',$data);
}
else
  {
    $this->load->view('add_genere');
  }


}


}
