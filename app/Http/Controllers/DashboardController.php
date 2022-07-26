<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Order;
use Session;

class DashboardController extends Controller
{
    //

    public function toHome(){
        $header = "home";
        $session = Session::get('email');

        return view('Dashboard.index',[
            'header'    => $header,
            'isLogin'   => $session,
        ]);
    }

    public function toDesign(){
        $header = "design";
        $session = Session::get('email');
        return view('Design.index', [
            'header'    => $header,
            'isLogin'   => Session::get('email'),
        ]);
    }

    public function toDesignDetail($type){
        $header = "design";
        if($type == 'a'){
            return view('Design.detail.type_a', [
                'header'    => $header,
                'isLogin'   => Session::get('email'),
            ]);
        } else if($type == 'b'){
            return view('Design.detail.type_b', [
                'header'    => $header,
                'isLogin'   => Session::get('email'),
            ]);
        }else if($type == 'br'){
            return view('Design.detail.type_br', [
                'header'    => $header,
                'isLogin'   => Session::get('email'),
            ]);
        }else if($type == 'c'){
            return view('Design.detail.type_c', [
                'header'    => $header,
                'isLogin'   => Session::get('email'),
            ]);
        }else if($type == 'd'){
            return view('Design.detail.type_d', [
                'header'    => $header,
                'isLogin'   => Session::get('email'),
            ]);
        }
    }

    public function toContact(){
        $header = "contact";
        return view('Contact.index', [
            'header'    => $header,
            'isLogin'   => Session::get('email'),
        ]);
    }

    public function toProjects(){
        $header = "projects";
        return view('Projects.index', [
            'header'    => $header,
            'isLogin'   => Session::get('email'),
        ]);
    }

    public function toLogin(){
        return view('Auth.login');
    }

    public function toSignup(){
        return view('Auth.signup');
    }

    public function toOrder(){
        return view('Form.order');
    }




    public function onOrderForm(Request $request){
        $valid = $request->validate([
                "ordered_date"      => 'required',
                "required_date"     => 'required',
                "customer"          => 'required',
                'order_number'      => 'required',
                "delivery_address"  => 'required',
                "door_design"       => 'required',
                "telephone"         => 'required',
                "edge_profile"      => 'required',
                "fax"               => 'required',
                "door_colour"       => 'required',
                "contact_person"    => 'required',
                "one_two"           => 'required',
                "cabinet_type"      => 'required',
                "kisks_rail_type"   => 'required',
                "door_type"         => 'required',
                "drawer_type"       => 'required',
                "hinge_type"        => 'required',
        ]);

        Order::create([
                "ordered_date"      => $valid['ordered_date'],
                "required_date"     => $valid['required_date'],
                "customer"          => $valid['customer'],
                "order_number"      => $valid['order_number'],
                "delivery_address"  => $valid['delivery_address'],
                "door_design"       => $valid['door_design'],
                "telephone"         => $valid['telephone'],
                "edge_profile"      => $valid['edge_profile'],
                "fax"               => $valid['fax'],
                "door_color"        => $valid['door_colour'],
                "contact_person"    => $valid['contact_person'],
                "pvc_edging"        => $valid['one_two'],
                "cabinet_type"      => $valid['cabinet_type'],
                "kisks_rail_type"   => $valid['kisks_rail_type'],
                "door_type"         => $valid['door_type'],
                "drawer_type"       => $valid['drawer_type'],
                "hinge_type"        => $valid['hinge_type'],
        ]);

        return redirect()->route('toOrder');

    }

    // {
    //     "ordered_date":"06\/28\/2022",
    //     "required_date":"06\/28\/2022",
    //     "customer":"asdf",
    //     "order_number":"asdf",
    //     "delivery_address":"asdf",
    //     "door_design":"asdf",
    //     "telephone":"asdf",
    //     "edge_profile":"asdf",
    //     "fax":"asdf",
    //     "door_colour":"asdf",
    //     "contact_person":"asdf",
    //     "one_two":"1",
    //     "cabinet_type":"1",
    //     "kisks_rail_type":"1",
    //     "door_type":"1",
    //     "drawer_type":"1",
//         "hinge_type":"1"
//     }
}
