#!/usr/bin/python3.10
import sys
import logging, sys
import os

dirname = os.path.dirname(__file__)
logger = logging.getLogger()
logger.setLevel(logging.INFO)
logger.addHandler(logging.StreamHandler(sys.stdout))
logger.warning('This is a warning')
logger.warning({"fddf":234})

from lineage import Lineage
# l = Lineage(output_dir='../storage/app/dna/output')
l = Lineage(output_dir= os.path.join(dirname, 'ddd_example'))

# paths = l.download_example_datasets()
user662 = l.create_individual('User662', ['resources/662.23andme.340.txt.gz', 'resources/662.ftdna-illumina.341.csv.gz'])