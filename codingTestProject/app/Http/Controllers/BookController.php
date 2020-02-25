<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Excel;
use App\Exports\BookExport;
use App\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $book_data = DB::table('books')->get();
        $books = Book::all()->toArray();
        return view('book.home',compact('books'))->with('book_data', $book_data);
    }

    public function export()
    {
        return Excel::download(new BookExport, 'Books.xlsx');
    }

    public function exportcsv()
    {
        return Excel::download(new BookExport, 'Books.csv');
    }

    public function action(Request $request){

      if($request->ajax()){
          $query = $request->get('query');
          if($query != ''){
            $data = DB::table('books')->where('title','like','%'.$query.'%')->orWhere('author','like','%'.$query.'%')->orderBy('id','desc')->get();
          }else{
            $data = DB::table('books')->orderBy('id','desc')->get();

          }
          $total_row = $data->count();
          if($total_row > 0){
            foreach($data as $row){

              $output = '
              <tr>
              <td>'.$row->title.'</td>
              <td>'.$row->author.'</td>
              </tr>';
            }
          }else{
            $output = '
            <tr>
            <td align="center" colspan="5">No Data Found</td>
            </tr>';
          }
          $data = array(
            'table_data' => $output,
            // 'total_data' => $total_data
          );
          echo json_encode($data);
      }

  }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('book.home');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
          'title' => 'required',
          'author' => 'required'
        ]);

        $book = new Book([
          'title' => $request->get('title'),
          'author' => $request->get('author'),
        ]);
        $book->save();
        return redirect()->route('book.index')->with('success','Data Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id);
        return view('book.edit', compact('book','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
          'author' => 'required'
        ]);
        $book = Book::find($id);
        $book->author= $request->get('author');
        $book->save();
        return redirect()->route('book.index')->with('Success','Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);
        $book->delete();
        return redirect()->route('book.index')->with('success','Data Deleted');
    }
}
