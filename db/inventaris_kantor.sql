
CREATE TABLE IF NOT EXISTS `inventaris_kantor` (
  `kode_barang` char(5) NOT NULL,
  `nama_barang` char(20) NOT NULL,
  `jumlah` int(4) NOT NULL,
  `harga` int(8) NOT NULL,
  PRIMARY KEY (`kode_barang`)
);

INSERT INTO `inventaris_kantor` VALUES
('87123', 'Komputer', '1',8000000),
('87925', 'Lemari', '3',500000),
('87673', 'Meja', '2',300000);
