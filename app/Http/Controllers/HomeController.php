<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\Student;

class HomeController extends Controller
{
    public function Wellcome()
    {
        return view('welcome');
    }

    public function index()
    {
        return view('crud');
    }
    public function register()
    {
        return view('register');
    }

    public function upload(Request $request)
    {
        // Khởi tạo đối tượng student mới
        $student = new Student;

        // Gán giá trị cho các thuộc tính của student
        $student->name = $request->name;
        $student->email = $request->email;
        Log::info("vào đâynhe");

        // Kiểm tra xem request có file được tải lên không
        if ($request->hasFile('files')) {
            Log::info("vào đây");
            // Lấy đối tượng file từ request
            $image = $request->file('files');

            // Tạo tên file mới, bao gồm thời gian và tên gốc của file
            $imageName = time() . '-' . $image->getClientOriginalName();
            // Di chuyển file đã upload đến thư mục 'student'
            $image->move(public_path('student'), $imageName);

            // Lưu tên file vào thuộc tính 'image' của student
            $student->image = $imageName;
        }

        // Lưu thông tin sinh viên vào cơ sở dữ liệu
        $student->save();

        // Quay lại trang trước
        return redirect()->back()->with('success', 'Student uploaded successfully!');
    }

    //     Log::info("upload method called"); // Log entry to confirm method entry

    //     // // Validate form inputs


    //     Log::info("Validation passed"); // Log after validation

    //     // Handle file upload
    //     if ($request->hasFile('file')) {
    //         $fileName = time().'.'.$request->file->extension();
    //         $request->file->move(public_path('uploads'), $fileName);

    //         // Log::info("File uploaded successfully", ['file' => $fileName]); // Log file upload details
    //     }

    //     // Save data to the database
    //     $student = Student::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'image' => $fileName ?? null,
    //     ]);


    //     Log::info("Student record created", ['student' => $student]); // Log after database operation
    //     return back()->with('success', 'Form submitted successfully!');
    // }
    public function view(){
        $data = student::all();
        return view('display', compact('data'));
    }
     public function delete($id){
        $data = student::find($id);
        $data->delete();
   return redirect()->back();
    }
    public function search(Request $request){
          $search = $request ->search;//nhận đc thoog tin cụ thể mà người dùng đang tìm kiếm
          $data = student::where('name','like','%'.$search.'%')->orWhere('email','like','%'.'$search'.'%')->get();//tìm trng bảng học sinh thông tin tìm kiếm
          return view('display',compact('data'));

    }
    public function update_view($id){
         $student=Student::find($id);
         return view('update_page',compact('student'));
    }
    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        $student->name = $request->input('name');
        $student->email = $request->input('email');

        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('student'), $imageName);
            $student->image = $imageName;
        }

        $student->save();

        return redirect()->back()->with('success', 'Student updated successfully.');
    }

}
