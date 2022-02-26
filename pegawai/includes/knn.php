<?php
class KNN
{
	public $dataset; //dataset
	protected $target; //atribut target
	protected $nilai; //nilai setiap atribut
	protected $k_nearest; //nilai k nearest

	protected $nilai_konversi; //konversi atribut kategorikal menjadi nilai
	public $dataset_nilai; //hasil konversi dataset atribut kategorikal menjadi nilai
	protected $minmax; //nilai minimum dan maksimum atribut
	public $normal; //hasil normalisasi dataset
	public $jarak; //jarak (euclidean distance) data test dengan dataset
	public $nearest; //dataset yang terdekat sesuai jumlah k_nearest
	public $total; //total dataset berdasarkan klasifikasi
	public $hasil; //hasil klasifikasi

	function __construct($dataset, $target, $nilai, $k_nearest)
	{
		$this->dataset = $dataset;
		$this->target = $target;
		$this->nilai = $nilai;
		$this->k_nearest = $k_nearest;

		$this->dataset_nilai();
		$this->jarak();
		$this->nearest();
	}

	function dataset_nilai()
	{
		global $ATRIBUT_NILAI;
		$this->nilai_konversi = array();
		foreach ($ATRIBUT_NILAI as $key => $val) {
			$no = 1;
			foreach ($val as $k => $v) {
				$this->nilai_konversi[$k] = $no; //memberikan nilai otomatis nilai atribut kategorikal dari 1, 2, 3, dst
				$no++;
			}
		}
		$this->dataset_nilai = array();
		foreach ($this->dataset as $key => $val) {
			foreach ($val as $k => $v) {
				//mengkonversi dataset kategorikal menjadi numerik kecuali atribut target
				$this->dataset_nilai[$key][$k] = ($k == $this->target || !$ATRIBUT_NILAI[$k]) ? $v :  $this->nilai_konversi[$v];
			}
		}
	}

	function nearest()
	{
		$no = 1;
		foreach ($this->jarak as $key => $val) {
			$this->nearest[] = $key;
			$this->total[$this->dataset_nilai[$key][$this->target]]++;
			if ($no++ >= $this->k_nearest) //jika jumlah nearest sudah lebih dari nilai yang diinput, maka berhenti
				break;
		}
		arsort($this->total); //mengurutkan total dari terbesar ke terkecil (paling banyak)
		$this->hasil  = key($this->total); //hasil merupakan total terbanyak
	}

	function jarak()
	{
		$arr = array();

		//menghitung jarak euclidean distance
		foreach ($this->dataset_nilai as $key => $val) {
			foreach ($val as $k => $v) {
				if ($k != $this->target) {
					$this->kuadrat[$key][$k] = pow($v - $this->nilai[$k], 2);
					$arr[$key] += pow($v - $this->nilai[$k], 2); //mengkuadratkan
				}
			}
		}
		foreach ($arr as $key => $val) {
			$this->jarak[$key] = sqrt($val); //mengakarkan
		}
		//mengurutkan jarak dari terkecil ke terbesar
		asort($this->jarak);
	}
}
