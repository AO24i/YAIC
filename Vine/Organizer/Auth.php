<?php //*** Auth ~ organizer » Yaic™ Library for Laravel © 2024 ∞ AO™ • @osawereao • www.osawere.com ∞ Apache License ***//

namespace App\Yaic\Vine\Organizer;

use App\Yaic\Anci\EnvX;
use App\Yaic\Anci\DebugX;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\View;

class Auth
{
	// ◈ property
	private $init;
	private $viewPath;



	// ◈ === passwordChange »
	public function passwordChange(Request $request)
	{
		return view($this->setViewAs('update.password'), $this->setData());
	}



	// ◈ === profileUpdate »
	public function profileUpdate(Request $request)
	{
		return view($this->setViewAs('update.profile'), $this->setData());
	}



	// ◈ === signatureUpdate »
	public function signatureUpdate(Request $request)
	{
		return view($this->setViewAs('update.signature'), $this->setData());
	}



	// ◈ === signout »
	public function signout(Request $request)
	{
		return view($this->setViewAs('signout'), $this->setData());
	}



	// ◈ === resetForm »
	public function resetForm()
	{
		$this->resetErrorBag();
		// $this->reset(['field']);
	}



	// ◈ === viewAs »
	private function setViewAs($view)
	{
		$this->init();
		$view = $this->viewPath . $view;
		if (View::exists($view)) {
			return $view;
		}
		return DebugX::blade404($view);
	}



	// ◈ === setData »
	private function setData(array $data = null, Request $request = null): array
	{
		$data = $data ?? [];
		$request = $request ?? request();
		return array_merge($data, [
			'request' => $request,
			'user' => $request->user(),
		]);
	}



	// ◈ === init »
	private function init()
	{
		if ($this->init !== true) {
			$this->viewPath = EnvX::project('theme') . '.page.auth.';
			$this->init = true;
		}
	}

}//> end of organizer ~ Auth
